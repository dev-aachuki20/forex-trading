<?php



namespace App\Livewire\Admin\Blog;



use App\Models\Blog;

use App\Models\Tag;

use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\WithPagination;

use Livewire\WithFileUploads;

use Illuminate\Support\Str;

use Livewire\Component;

use App\Models\Language;



class Index extends Component

{

    use WithPagination, LivewireAlert, WithFileUploads;



    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;

    public $statusText = 'Active';

    public $activeTab = 1;

    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;

    public $languageId;

    public $viewDetails = null, $status = 1;



    public $blog_id = null, $title, $category, $tags, $description, $image, $originalImage, $removeImage=false, $link, $publish_date;



    public $author_name, $author_description, $authorImage, $originalAuthorImage, $removeAuthorImage=false,$allTags;



    protected $listeners = [

        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction', 'refreshComponent' => 'render','removeTag'

    ];





    public function render()

    {

        $statusSearch = null;

        $searchValue = $this->search;

        if (Str::contains('active', strtolower($searchValue))) {

            $statusSearch = 1;

        } else if (Str::contains('inactive', strtolower($searchValue))) {

            $statusSearch = 0;

        }

        $languagedata =  Language::where('status', 1)->get();



        $allBlog = [];

        if ($this->activeTab) {

            $allBlog = Blog::query()->where('language_id', $this->activeTab)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch) {

                $query->where('title', 'like', '%' . $searchValue . '%')

                    ->orWhere('category', $statusSearch)

                    ->orWhere('status', $statusSearch)

                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);

            })

                ->orderBy($this->sortColumnName, $this->sortDirection)

                ->paginate($this->paginationLength);

        }



        return view('livewire.admin.blog.index', compact('allBlog', 'languagedata'));

    }



    public function updatePaginationLength($length)

    {

        $this->paginationLength = $length;

    }



    public function switchTab($tab)

    {

        $this->resetPage('page');

        $this->activeTab = $tab;

        $this->search = '';

    }



    public function updatedSearch()

    {

        $this->resetPage();

    }



    public function clearSearch()

    {

        $this->search = '';

    }



    public function sortBy($columnName)

    {

        $this->resetPage();



        if ($this->sortColumnName === $columnName) {

            $this->sortDirection = $this->swapSortDirection();

        } else {

            $this->sortDirection = 'asc';

        }



        $this->sortColumnName = $columnName;

    }



    public function swapSortDirection()

    {

        return $this->sortDirection === 'asc' ? 'desc' : 'asc';

    }



    public function create()

    {

        $this->resetPage('page');

        $this->formMode = true;

        $this->allTags = Tag::get();

        $this->languageId = Language::where('id', $this->activeTab)->value('id');

        $this->initializePlugins();

        $this->reset([

            'image', 'originalImage','removeImage', 'link', 'title', 'category', 'description', 'search', 'status'

            ,'tags','author_name','author_description','authorImage','originalAuthorImage','removeAuthorImage','publish_date'

        ]);



    }



    public function cancel()

    {

        $this->formMode = false;

        $this->updateMode = false;

        $this->viewMode = false;

        $this->resetErrorBag();

    }



    public function store()

    {

        $validatedData = $this->validate([

            'title'           => ['required', 'max:100', /*'unique:blogs,title'*/],

            'category'        => ['required'],

            'tags'            => ['nullable'],

            'author_name'     => ['required'],

            'description'     => ['required','strip_tags'],

            'author_description'=>['required','strip_tags'],

            'status'          => ['required'],

            'image'           => ['required','image'],

            'authorImage'     => ['nullable','image','max:'.config('constants.img_max_size')],

            'publish_date'    => ['required']

        ],[

            'description.strip_tags' => 'The description field is required.',

            'author_description.strip_tags' => 'The author description field is required.',

        ]);



        $validatedData['status']      = $this->status;

        $validatedData['language_id'] = $this->languageId;



        $tagIds = [];
        if($this->tags){
            foreach ($this->tags as $tagTitle) {

                // Check if the tag already exists

                $tag = Tag::firstOrCreate(['title' => $tagTitle]);

                // Add the tag ID to the array

                $tagIds[] = $tag->id;
            }
        }


        unset($validatedData['tags']);
        
        $blog = Blog::create($validatedData);
        
        $blog->selectedTags()->sync($tagIds);


        uploadImage($blog, $this->image, 'blog/image/', "blog-image", 'original', 'save', null);



        if($this->authorImage){

            uploadImage($blog, $this->authorImage, 'blog/author-image/', "blog-author-image", 'original', 'save', null);

        }



        $this->formMode = false;

        $this->alert('success',  getLocalization('added_success'));

    }



    public function edit($id)

    {

        $this->resetPage('page');

        $this->allTags = Tag::get();

        $blog = Blog::findOrFail($id);

        $this->title           = $blog->title;

        $this->blog_id         = $id;

        $this->category        = $blog->category;

        $this->description     = $blog->description;

        $this->status          = $blog->status;

        $this->originalImage   = $blog->image_url;

        $this->tags    = $blog->selectedTags()->pluck('title')->toArray();

        $this->author_name     = $blog->author_name;

        $this->author_description = $blog->author_description;

        $this->publish_date = $blog->publish_date;

        $this->originalAuthorImage   = $blog->author_image_url;

        $this->formMode = true;

        $this->updateMode = true;

        $this->initializePlugins();

        

    }



    public function update()

    {

        $validatedArray = [

            'title'           => ['required', 'max:100', /*'unique:blogs,title,' . $this->blog_id*/],

            'category'        => ['required'],

            'tags'            => ['nullable'],

            'author_name'     => ['required'],

            'description'     => ['required','strip_tags'],

            'author_description'=>['required','strip_tags'],

            'publish_date'     =>['required'],

            'status'          => ['required'],

        ];

     

        if ($this->image) {

            $validatedArray['image'] = 'required|image|max:' . config('constants.img_max_size');

        }



        if($this->removeImage){

            $validatedArray['image'] = 'required|image|max:' . config('constants.img_max_size');

        }



        if ($this->authorImage) {

            $validatedArray['authorImage'] = 'nullable|image|max:' . config('constants.img_max_size');

        }

        



        $validatedData = $this->validate($validatedArray,[

            'description.strip_tags' => 'The description field is required.',

            'author_description.strip_tags' => 'The author description field is required.',

        ]);



        $validatedData['status'] = $this->status;



        $tagIds = [];



        if($this->tags){

            foreach ($this->tags as $tagTitle) {

                // Check if the tag already exists

                $tag = Tag::firstOrCreate(['title' => $tagTitle]);



                // Add the tag ID to the array

                $tagIds[] = $tag->id;

            }

        }



        $blog = Blog::find($this->blog_id);

        # Check if the image has been changed

        $uploadId = null;

        if ($this->image) {

            if (!is_null($blog->blogImage)) {

                $uploadId = $blog->blogImage->id;

                uploadImage($blog, $this->image, 'blog/image/', "blog-image", 'original', 'update', $uploadId);

            } else {

                uploadImage($blog, $this->image, 'blog/image/', "blog-image", 'original', 'save', null);

            }

        }



        if($this->authorImage){

            if (!is_null($blog->authorImage)) {

                uploadImage($blog, $this->authorImage, 'blog/author-image/', "blog-author-image", 'original', 'update', $blog->authorImage->id);

            }else{

                uploadImage($blog, $this->authorImage, 'blog/author-image/', "blog-author-image", 'original', 'save', null);

            }

        }else{

            if ($blog->authorImage && $this->removeAuthorImage) {

                deleteFile($blog->authorImage->id);

                $this->removeAuthorImage = false;

            }

            

        }



        

        $blog->update($validatedData);



        Blog::find($this->blog_id)->selectedTags()->sync($tagIds);



        $this->formMode = false;

        $this->updateMode = false;

        $this->reset([

            'blog_id','image', 'originalImage','removeImage', 'link', 'title', 'category', 'description', 'search', 'status'

            ,'tags','author_name','author_description','authorImage','originalAuthorImage','removeAuthorImage','publish_date'

        ]);



        $this->alert('success',  getLocalization('updated_success'));

    }



    public function delete($id)

    {

        $this->confirm('Are you sure?', [

            'text' => 'You want to delete it.',

            'confirmButtonText' => 'Yes, delete it!',

            'cancelButtonText' => 'No, cancel!',

            'onConfirmed' => 'deleteConfirm',

            'onCancelled' => function () {

                // Do nothing or perform any desired action

            },

            'inputAttributes' => ['deleteId' => $id],

        ]);

    }



    public function deleteConfirm($data)

    {

        $deleteId = $data['inputAttributes']['deleteId'];

        $model = Blog::find($deleteId);



        if ($model->blogImage) {

            $uploadImageId = $model->blogImage->id;

            deleteFile($uploadImageId);

        }

        $model->delete();

        $this->alert('success',  getLocalization('delete_success'));

    }



    public function show($id)

    {

        $this->resetPage('page');

        $this->blog_id = $id;

        $this->formMode = false;

        $this->viewMode = true;

    }



    public function toggle($id, $toggleIndex)

    {

        $this->confirm('Are you sure?', [

            'text' => 'You want to change the status.',

            'toast' => false,

            'position' => 'center',

            'confirmButtonText' => 'Yes, change it!',

            'cancelButtonText' => 'No, cancel!',

            'onConfirmed' => 'confirmedToggleAction',

            'onDismissed' => 'cancelledToggleAction',

            'inputAttributes' => ['blogId' => $id, 'toggleIndex' => $toggleIndex],

        ]);

    }



    public function confirmedToggleAction($data)

    {

        $toggleIndex = $data['inputAttributes']['toggleIndex'];

        $blogId = $data['inputAttributes']['blogId'];

        $model = Blog::find($blogId);

        $status = !$model->status;

        $model->status = $status;

        $model->save();

        $this->alert('success',  getLocalization('change_status'));

        $this->dispatch('changeToggleStatus', ['status' => $status, 'index' => $toggleIndex,'activeTab'=> $this->activeTab]);

    }



    public function changeStatus($statusVal)

    {

        $this->status = (!$statusVal) ? 1 : 0;

    }





    public function initializePlugins()

    {

        $this->dispatch('loadPlugins');

    }

}

