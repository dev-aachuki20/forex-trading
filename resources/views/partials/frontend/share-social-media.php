<script>
    //Social media shareable
    let textContent = '';
    let imageContent = '';
    let videoContent = '';
    var content='';

    document.addEventListener('openSocialMediaModal', function (event) {
        // console.log(event.detail[0]);

        var detail = event.detail[0];
        textContent = detail.textContent;
        imageContent = detail.image != undefined ? detail.image : '';
        videoContent = detail.video != undefined ? detail.video : '';

        // Content you want to share
        content = textContent+"\n";

        if(imageContent != ''){
            content+= "Image:"+imageContent+"\n";
        }

        if(videoContent != ''){
            content+="Video:"+videoContent;
        }

        // console.log(textContent,'text-content');
        // console.log(imageContent,'image-content');
        // console.log(videoContent,'video-content');

        $('#share-social').modal('show');

    });

    document.addEventListener('shareSocialMedia',function(event){
        var detail = event.detail[0];
        textContent = detail.textContent;
        imageContent = detail.image != undefined ? detail.image : '';
        videoContent = detail.video != undefined ? detail.video : '';

        // Content you want to share
        content = textContent+"\n";

        if(detail.media_name != 'facebook'){
            if(imageContent != ''){
                content+= "Image:"+imageContent+"\n";
            }

            if(videoContent != ''){
                content+="Video:"+videoContent;
            }
        }
        

        // console.log(textContent,'text-content');
        // console.log(imageContent,'image-content');
        // console.log(videoContent,'video-content');

        switch (detail.media_name) {
            case "facebook":
                console.log("Facebook");
                shareOnFacebook();
                break;
            case "instagram":
                console.log("Instagram");
                shareOnInstagram();
                break;
            case "twitter":
                console.log("Twitter");
                shareOnTwitter();
                break;
            case "whatsapp":
                console.log("Whatsapp");
                shareOnWhatsApp();
                break;
            case "telegram":
                console.log('Telegram');
                shareOnTelegram();
                break;
            case "line":
                console.log("Line");
                shareOnLine();
                break;
            default:
                console.log("Invalid media");
        }


    });
   
    function shareOnFacebook() { 

        // Content you want to share
        var content = textContent !='' ? textContent :"Testing share content";

        // Encode the content for the URL
        var encodedContent = encodeURIComponent(textContent);

        // Create the Facebook share link
        // var facebookLink = "https://www.facebook.com/sharer/sharer.php?d=" + encodedContent;
        var facebookLink = "https://www.facebook.com/sharer/sharer.php?";

        //share video link
        if(videoContent != ''){
            facebookLink+="&u=" + encodeURIComponent(videoContent);
        }
        
        // URL of the image or video you want to share
        if(videoContent == '' && imageContent != ''){
            facebookLink+="&u=" + encodeURIComponent(imageContent);
        }

        // // Content you want to share
        // var content = "Check out this amazing content: https://example.com";

        // // Encode the content for the URL
        // var encodedContent = encodeURIComponent(content);

        // // Create the Facebook share link
        // var facebookLink = "https://www.facebook.com/sharer/sharer.php?u=" + encodedContent;


        // console.log(facebookLink);

        // Open the link in a new tab or redirect the user
        window.open(facebookLink, '_blank');

    }

    function shareOnTwitter() { 
        // Encode the content for the URL
        var encodedContent = encodeURIComponent(content);

        // Create the Twitter share link
        var twitterLink = "https://twitter.com/intent/tweet?text=" + encodedContent;

        // Open the link in a new tab or redirect the user
        window.open(twitterLink, '_blank');

    }

    function shareOnInstagram() { 
        // Encode the content for the URL
        var encodedContent = encodeURIComponent(content);

        // Create the Instagram share link
        var instagramLink = "instagram://library?AssetPath=" + encodedContent;

        // Try to open the Instagram app
        window.location.href = instagramLink;

        // If the app is not installed, redirect to the Instagram website
        setTimeout(function() {
            // window.location.href = "https://www.instagram.com";
            window.open("https://www.instagram.com", "_blank");
        }, 500);
    }

    function shareOnWhatsApp() { 
        // Encode the content for the URL
        var encodedContent = encodeURIComponent(content);

        // Create the WhatsApp share link
        var whatsappLink = "https://wa.me/?text=" + encodedContent;

        // Open the link in a new tab or redirect the user
        window.open(whatsappLink, '_blank');
    } 

    function shareOnTelegram(){
        // Encode the content for the URL
        var encodedContent = encodeURIComponent(content);

        // Create the Telegram share link
        var telegramLink = "https://t.me/share/url?url=" + encodedContent;

        // Open the link in a new tab or redirect the user
        window.open(telegramLink, '_blank');
    } 

    function shareOnLine(){
        // Encode the content for the URL
        var encodedContent = encodeURIComponent(content);

        // Create the LINE share link
        var lineLink = "https://line.me/R/msg/text/?" + encodedContent;

        // Open the link in a new tab or redirect the user
        window.open(lineLink, '_blank');
    }
</script>