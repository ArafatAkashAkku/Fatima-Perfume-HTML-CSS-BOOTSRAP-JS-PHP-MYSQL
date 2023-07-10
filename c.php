<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- external css link  -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- favicon link  -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- manifest link  -->
    <link rel="manifest" href="manifest.webmanifest">
    <!-- website title  -->
    <title>Website Title</title>
</head>

<body>
    <!-- header start  -->
    <header>
        <?php include("includes/header1.php") ?>
        <?php include("includes/header2.php") ?>
        <?php include("includes/header3.php") ?>
        <?php include("includes/header4.php") ?>
    </header>
    <!-- header end  -->


    <!-- main start  -->
    <main>


        <!-- pwa update message section start  -->
        <section>
            <div id="snackbar">
                <p><a id="reload">A new version of this app is available. Click here to update.</a></p>
            </div>
        </section>
        <!-- pwa update message section end  -->
    </main>
    <!-- main end  -->

    <!-- footer start  -->

    <footer>

    </footer>
    <!-- footer end  -->



    <!-- google translation link  -->
    <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
    <!-- external js link  -->
    <script src="js/index.js"></script>
    <!-- swipper js  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        // pwa installation updation 
        // https://codyanhorn.tech/blog/pwa-reload-page-on-application-update
        // every update requires the changes in cache name in sw.js file 
        (function() {
            // Track an updated flag and an activated flag.
            // When both of these are flagged true the service worker was updated and activated.
            let updated = false;
            let activated = false;
            navigator.serviceWorker.register('/sw.js').then(regitration => {
                regitration.addEventListener("updatefound", () => {
                    const worker = regitration.installing;
                    worker.addEventListener('statechange', () => {
                        if (worker.state === "activated") {
                            // Here is when the activated state was triggered from the lifecycle of the service worker.
                            // This will trigger on the first install and any updates.
                            activated = true;
                            checkUpdate();
                        }
                    });
                });
            });

            navigator.serviceWorker.addEventListener('controllerchange', () => {
                // This will be triggered when the service worker is replaced with a new one.
                // It does not just reload the page right away, so to make sure it is fully activated using the checkUpdate function.
                updated = true;
                checkUpdate();
            });

            function checkUpdate() {
                let snackbar = document.getElementById('snackbar');
                if (activated && updated) {
                    snackbar.classList.add('show');
                    document.getElementById('reload').addEventListener('click', function() {
                        window.location.reload();
                    });
                }
            }
        })();
    </script>
</body>

</html>