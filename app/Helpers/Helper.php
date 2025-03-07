<?php

use App\Models\Language;
use Illuminate\Support\Str as Str;
use App\Models\Uploads;
use App\Models\Setting;
use App\Models\Localization;
use App\Models\Page;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

if (!function_exists('getLocalization')) {
	function getLocalization($key)
	{
		$result = null;
		$locale = app()->getLocale();
		$langId = Language::where('code', $locale)->value('id');
		$language = Localization::where('key', $key)->where('language_id', $langId)->first();

		if ($language) {
			$result = $language->value;
		} else {
			$result = 'Translation not found';
		}
		return $result;
	}
}

if (!function_exists('getLocalizationDetail')) {
	function getLocalizationDetail($key)
	{
		$localization = Localization::where('key', $key)->first();
		return $localization;
	}
}

if (!function_exists('uploadFile')) {
	/**
	 * Upload Image.
	 *
	 * @param array $input
	 *
	 * @return array $input
	 */
	function uploadFile($directory, $tmpFolderPath, $newFolderPath, $type = "profile", $fileType = "jpg", $actionType = "save", $uploadId = null, $orientation = null)
	{
		$saveFilePath = $newFolderPath;

		// Set the paths for the tmp and new directories
		$tmpPath = storage_path('app/public/' . $tmpFolderPath);
		$newPath = storage_path('app/public/' . $newFolderPath);

		// Check if the file exists in the tmp directory
		if (File::exists("{$tmpPath}")) {

			if (!File::exists($newPath)) {
				File::makeDirectory($newPath, 0775, true, true);
			}

			$extension = pathinfo($tmpPath, PATHINFO_EXTENSION);

			$timestamp = now()->timestamp;
			$uniqueId = uniqid();

			$fileName = $timestamp . '_' . $uniqueId;

			$newPath .= $fileName . '.' . $extension;
			$saveFilePath .= $fileName . '.' . $extension;

			// Move the file to the new directory
			File::move("{$tmpPath}", "{$newPath}");

			$oldFile = null;
			if ($actionType == "save") {
				$upload               		= new Uploads;
			} else {
				$upload               		= Uploads::find($uploadId);
				$oldFile = $upload->file_path;
			}

			$upload->file_path      	= $saveFilePath;
			$upload->extension      	= $extension;
			$upload->original_file_name = null;
			$upload->type 				= $type;
			$upload->file_type 			= $fileType;
			$upload->orientation 		= $orientation;
			$response             		= $directory->uploads()->save($upload);
			// delete old file
			if ($oldFile) {
				Storage::disk('public')->delete($oldFile);
			}

			return $upload;
		}
	}
}




if (!function_exists('uploadImage')) {
	/**
	 * Upload Image.
	 *
	 * @param array $input
	 *
	 * @return array $input
	 */
	function uploadImage($directory, $file, $folder, $type = "language", $fileType = "svg", $actionType = "save", $uploadId = null, $orientation = null)
	{
		$oldFile = null;
		if ($actionType == "save") {
			$upload               		= new Uploads;
		} else {
			$upload               		= Uploads::find($uploadId);
			$oldFile = $upload->file_path;
		}
		$upload->file_path      	= $file->store($folder, 'public');
		$upload->extension      	= $file->getClientOriginalExtension();
		$upload->original_file_name = $file->getClientOriginalName();
		$upload->type 				= $type;
		$upload->file_type 			= $fileType;
		$upload->orientation 		= $orientation;
		$response             		= $directory->uploads()->save($upload);
		// delete old file
		if ($oldFile) {
			Storage::disk('public')->delete($oldFile);
		}
		return $upload;
	}
}

if (!function_exists('uploadMultipleImages')) {
	function uploadMultipleImages($directory, $files, $folder, $type = "language", $fileType = "svg", $actionType = "save", $uploadIds = null, $orientation = null)
	{
		$uploads = [];
		foreach ($files as $file) {
			$oldFile = null;
			if ($actionType == "save") {
				$upload               		= new Uploads;
			} else {
				$upload               		= Uploads::find($uploadIds[$file->name]);
				$oldFile = $upload->file_path;
			}
			$upload->file_path      	= $file->store($folder, 'public');
			$upload->extension      	= $file->getClientOriginalExtension();
			$upload->original_file_name = $file->getClientOriginalName();
			$upload->type 				= $type;
			$upload->file_type 			= $fileType;
			$upload->orientation 		= $orientation;
			$response             		= $directory->uploads()->save($upload);
			// delete old file
			if ($oldFile) {
				Storage::disk('public')->delete($oldFile);
			}
			$uploads[] = $upload;
		}
		return $uploads;
	}
}


if (!function_exists('deleteMultipleFiles')) {
	/**
	 * Destroy Old Images.	 *
	 * @param array $ids
	 */
	function deleteMultipleFiles($upload_ids)
	{
		foreach ($upload_ids as $upload) {
			Storage::disk('public')->delete($upload->file_path);
			$upload->delete();
		}
		return true;
	}
}

if (!function_exists('convertToFloat')) {
	function convertToFloat($value)
	{
		if (is_numeric($value)) {
			return number_format((float)$value, 2, '.', ' ');
		}
		return $value;
	}
}

if (!function_exists('convertToFloatNotRound')) {
	function convertToFloatNotRound($value)
	{
		if (is_numeric($value)) {
			$dec = 2;
			return number_format(floor($value * pow(10, $dec)) / pow(10, $dec), $dec);
		}
		return $value;
	}
}


if (!function_exists('deleteFile')) {
	/**
	 * Destroy Old Image.	 *
	 * @param int $id
	 */
	function deleteFile($upload_id)
	{
		$upload = Uploads::find($upload_id);
		if ($upload) {
			if ($upload->file_path) {
				Storage::disk('public')->delete($upload->file_path);
			}
			$upload->delete();
			return true;
		}
	}
}


if (!function_exists('sendEmail')) {
	/**
	 * [sendEmail description]
	 * @return [type]        [description]
	 */
	function sendEmail()
	{
		return true;
	}
}


if (!function_exists('sendResetPasswordEmail')) {
	function sendResetPasswordEmail($user)
	{
		// $token = Str::random(64);

		// DB::table('password_resets')->insert(['email' => $user->email, 'token' => $token, 'created_at' =>  \Carbon\Carbon::now()->toDateTimeString()]);

		// $subject = trans('panel.email_contents.set_password.subject');
		// Mail::to($user->email)->send(new SetPasswordMail($user, $token, $subject)); 
		// return true;
	}
}


if (!function_exists('CurlPostRequest')) {
	function CurlPostRequest($url, $headers, $postFields)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $postFields,
			CURLOPT_HTTPHEADER => $headers,
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}
}

if (!function_exists('CurlGetRequest')) {
	function CurlGetRequest($url, $headers)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => $headers
		));

		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}
}

if (!function_exists('getCommonValidationRuleMsgs')) {
	function getCommonValidationRuleMsgs()
	{
		return [
			'password.required' => 'The new password is required.',
			'password.min' => 'The new password must be at least 8 characters',
			'password.different' => 'The new password and current password must be different.',
			'password.confirmed' => 'The password confirmation does not match.',
			'password_confirmation.required' => 'The new password confirmation is required.',
			'password_confirmation.min' => 'The new password confirmation must be at least 8 characters',
			'email.required' => 'Please enter email address.',
			'email.email' => 'Email is not valid. Enter email address for example test@gmail.com',
		];
	}
}

if (!function_exists('generateRandomString')) {
	function generateRandomString($length = 20)
	{

		$randomString = Str::random($length);

		return $randomString;
	}
}

if (!function_exists('convertDateTimeFormat')) {
	function convertDateTimeFormat($value, $type = 'date')
	{
		$changeFormatValue = Carbon::parse($value);

		$result = null;
		switch ($type) {
			case 'time':
				$result = $changeFormatValue->format(config('constants.time_format'));
				break;

			case 'datetime':
				$result = $changeFormatValue->format(config('constants.datetime_format'));
				break;

			case 'monthformat':
				$result = $changeFormatValue->format(config('constants.month_format'));
				break;

			case 'date_month':
				$result = $changeFormatValue->format(config('constants.date_month_format'));
				break;

			case 'month_year_format':
				$result = $changeFormatValue->format(config('constants.month_year_format'));
				break;

			default:
				$result =  $changeFormatValue->format(config('constants.date_format'));
				break;
		}

		return $result;
	}
}

if (!function_exists('getSetting')) {
	function getSetting($key)
	{
		$result = null;
		$setting = SiteSetting::where('key', $key)->where('status', 1)->first();
		if ($setting) {
			if ($setting->type == 'image' && !is_null($setting->image_url)) {
				$result = $setting->image_url;
			} elseif (!is_null($setting->value)) {
				$result = $setting->value;
			}
		}
		return $result;
	}
}



if (!function_exists('getSettingDetail')) {
	function getSettingDetail($key)
	{
		$setting = SiteSetting::where('key', $key)->where('status', 1)->first();
		return $setting;
	}
}

if (!function_exists('getOtherPages')) {
	function getOtherPages()
	{
		$result = Page::where('status', 1)->get();
		return $result;
	}
}

if (!function_exists('getDynamicPages')) {
	function getDynamicPages($type)
	{
		$result = Page::where('type', $type)->where('status', 1)->get();
		return $result;
	}
}

if (!function_exists('getPageContent')) {
	function getPageContent($page_key, $language_id)
	{
		$result = Page::where('page_key', $page_key)->where('status', 1)->where('language_id', $language_id)->first();
		return $result;
	}
}

if (!function_exists('isPageVisible')) {
	function isPageVisible($page_key)
	{
		$result = Page::where('page_key', $page_key)->where('is_visible', '=', 1)->exists();
		return $result;
	}
}

if (!function_exists('getSectionContent')) {
	function getSectionContent($section_key, $language_id)
	{
		$result = Setting::where('section_key', $section_key)->where('status', 1)->where('language_id', $language_id)->first();
		return $result;
	}
}

if (!function_exists('getFinancialYearMonths')) {
	function getFinancialYearMonths()
	{
		$currentDate = Carbon::now();
		$startYear = $currentDate->month < 4 ? $currentDate->year - 1 : $currentDate->year;
		$startMonth = 4; // Start from April
		$endYear = $currentDate->month < 4 ? $currentDate->year : $currentDate->year + 1;
		$endMonth = 3; // End in March

		$startDate = Carbon::createFromDate($startYear, $startMonth, 1);
		$endDate = Carbon::createFromDate($endYear, $endMonth, 1);

		$months = [];

		while ($startDate->lte($endDate)) {
			$months[] = $startDate->format('F');
			$startDate->addMonth();
		}

		return $months;
	}
}

if (!function_exists('generateUniqueInvoiceNumber')) {
	function generateUniqueInvoiceNumber()
	{
		return date('YmdHis') . mt_rand(100000, 999999);
	}
}

if (!function_exists('getKeyByValue')) {
	function getKeyByValue($array, $searchValue)
	{
		foreach ($array as $key => $value) {
			if ($value === $searchValue) {
				return $key;
			}
		}

		return null;
	}
}
