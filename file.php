<!DOCTYPE html>
<html lang="en">
<?php
//2023 - Şeref Can Mertdoğan. Please give attribution if you're using my file uploader. I would be very happy.
include "env.php";
 
function fileUploadProtection($allowedExtensions, $uploadDirectory, $maxFileSize)
{
    if (!isset($_FILES['filetoupload'])) {
        return ["status" => "error", "message" => "No file uploaded."];
    }

    $file = $_FILES['filetoupload'];

    // Check for errors during file upload
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ["status" => "error", "message" => "File upload error: " . $file['error']];
    }

    // Get the file extension
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

    // Check if the file extension is allowed
    if (!in_array($extension, $allowedExtensions)) {
        return ["status" => "error", "message" => "Invalid file extension."];
    }

    // Check the file size
    if ($file['size'] > $maxFileSize) {
        return ["status" => "error", "message" => "File size exceeds the maximum limit."];
    }

    $uniqueFilename = 'WBD-' . uniqid() . '.' . $extension;

    $destination = $uploadDirectory . $uniqueFilename;
    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        return ["status" => "error", "message" => "Failed to move the uploaded file."];
    }

    return ["status" => "success", "message" => "File uploaded successfully.", "filename" => $uniqueFilename];
}

$result = fileUploadProtection($allowedExtensions, $uploadDirectory, $maxFileSize);
if ($result["status"] === "success") {
    $successMessage = $result["message"];
    $filenamewithextension = $result["filename"];
    $uniqueFilename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
} else {
    $errorMessage = $result["message"];
}


?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ava Template</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i|Roboto:500" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>

<body class="is-boxed has-animations">
    <div class="body-wrap boxed-container">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
                            <a href="#">
                            <img src="sitelogo.png" width="128" height="32" />
                            </a>

                        </h1>
                    </div>
                    <br>
                    <div class="control">
                        <a class="button button-primary button-block button-shadow" href="#">CONTACT WITH US</a>

                    </div>


                </div>

            </div>
        </header>

        <main>
            <section class="hero text-center">
                <div class="container-sm">
                   
                    <div class="hero-inner">
        <?php if (isset($successMessage)): ?>
            <h1 class="hero-title h2-mobile mt-0 is-revealing"><?php echo htmlspecialchars($successMessage); ?></h1>
            <p class="hero-paragraph is-revealing">Please copy and note the link or file ID to somewhere else.</p>
        <?php elseif (isset($errorMessage)): ?>
            <h1 class="hero-title h2-mobile mt-0 is-revealing">Error</h1>
            <p class="hero-paragraph is-revealing"><?php echo htmlspecialchars($errorMessage); ?></p>
        <?php else: ?>
            <h1 class="hero-title h2-mobile mt-0 is-revealing">Upload File</h1>
            <p class="hero-paragraph is-revealing">Please select a file to upload.</p>
        <?php endif; ?>
                       
                        
        <div class="hero-form newsletter-form field field-grouped is-revealing">
            <?php if (isset($uniqueFilename)): ?>
                <div class="control control-expanded">
                    <input id="did" class="input" type="text" name="email" placeholder="Your Download ID&hellip;" value="<?php echo htmlspecialchars($uniqueFilename); ?>" >
                </div>
                <div class="control">
                    <a class="button button-primary button-block button-shadow" href="#" onclick="copyid();">COPY F. ID &nbsp;</a>
                </div>
         </div>   
         <br>
        <div class="hero-form newsletter-form field field-grouped is-revealing">
                <div class="control control-expanded">
                    <input id="dlink" class="input"  type="text" name="email"  placeholder="Your Download ID&hellip;" value="<?php echo $mainurl."?d=".htmlspecialchars($uniqueFilename); ?>" >
                </div>
                <div class="control">
                    <a class="button button-primary button-block button-shadow" href="#" onclick="copylink();">COPY LINK</a>
                </div>
                </div>
            
            <?php endif; ?>



                  
                    
            </section>


        </main>

        <footer class="site-footer text-light">
            <div class="container">
                <div class="site-footer-inner">
                    <div class="brand footer-brand">
                        <a href="#">
                        <img src="sitelogo.png" width="128" height="32" />

                        </a>
                    </div>
                    <ul class="footer-links list-reset">
                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <li>
                            <a href="#">About us</a>
                        </li>
                        <li>
                            <a href="#">FAQ's</a>
                        </li>
                        <li>
                            <a href="#">Support</a>
                        </li>
                    </ul>
                    <ul class="footer-social-links list-reset">
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Facebook</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z"
                                        fill="#FFFFFF" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Twitter</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z"
                                        fill="#FFFFFF" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Google</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z"
                                        fill="#FFFFFF" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="footer-copyright">&copy; 2023 - Webdeindir File Upload Service <br> Theme: Ava</div>
                </div>
            </div>
        </footer>
    </div>
    <script>
function copyid() {
  var copyText = document.getElementById("did");
  copyText.select();
  copyText.setSelectionRange(0, 99999); 
  navigator.clipboard.writeText(copyText.value);
  alert("Copied the ID: " + copyText.value);
}

function copylink() {
  var copyText = document.getElementById("dlink");
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices
  navigator.clipboard.writeText(copyText.value);
  alert("Copied the Link: " + copyText.value);
}
</script>
    <script src="dist/js/main.min.js"></script>
</body>

</html>

