<script>
    //Social media shareable
    let pageUrl = '';

    document.addEventListener('openSocialMediaModal', function (event) {
        pageUrl = encodeURIComponent(window.location.href);

        $('#share-social').modal('show');
    });

    document.addEventListener('shareSocialMedia',function(event){
       
        if(pageUrl == ''){
            pageUrl = encodeURIComponent(window.location.href);
        }

        var detail = event.detail[0];
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
        var facebookLink = "https://www.facebook.com/sharer/sharer.php?&u="+pageUrl;
       
        window.open(facebookLink, '_blank');

    }

    function shareOnTwitter() { 

        var twitterLink = "https://twitter.com/intent/tweet?url=" + pageUrl;

        window.open(twitterLink, '_blank');

    }

    function shareOnInstagram() { 

        // var instagramLink = "https://www.instagram.com/share?url=" + pageUrl;
        // window.open(instagramLink, '_blank');

         // Check if the user is on a mobile device
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            // Open the Instagram app with the pre-filled caption
            window.location.href = `instagram://share?text=${pageUrl}`;
        } else {
            // Open Instagram website on desktop
            window.open(`https://www.instagram.com/?url=${pageUrl}`);
        }

    }

    function shareOnWhatsApp() { 
        var whatsappLink = "https://wa.me/?text=" + pageUrl;
        window.open(whatsappLink, '_blank');
    } 

    function shareOnTelegram(){
        var telegramLink = "https://t.me/share/url?url=" + pageUrl;

        // Open the link in a new tab or redirect the user
        window.open(telegramLink, '_blank');
    } 

    function shareOnLine(){
        // Create the LINE share link
        var lineLink = "https://line.me/R/msg/text/?" + pageUrl;

        // Open the link in a new tab or redirect the user
        window.open(lineLink, '_blank');
    }
</script>