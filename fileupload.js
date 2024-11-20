const form = document.querySelector(".karl");
const fileInput = form.querySelector(".file-input");
const progressArea = document.querySelector(".progress-area");
const uploadedArea = document.querySelector(".uploaded-area");

// Add a click event listener to the label instead of the form
form.addEventListener("click", () => {
    fileInput.click();
});

// ... (previous code for form and file input setup) ...

fileInput.addEventListener("change", ({ target }) => {
    let file = target.files[0];
    if (file) {
        let fileName = file.name;

        // Create a FormData object and append the file
        let formData = new FormData();
        formData.append("file", file);

        // Create a new XMLHttpRequest
        let xhr = new XMLHttpRequest();

        // Configure the request
        xhr.open("POST", "upload.php");

        // Set up a load listener
        xhr.addEventListener("load", () => {
            if (xhr.status === 200) {
                console.log(`File ${fileName} uploaded successfully.`);
                
                // Remove the uploading status
                progressArea.innerHTML = '';

                // Add code to update the UI or display a success message
                const uploadedHTML = `
                    <li class="row">
                        <div class="content">
                            <i class="fa fas fa-file-alt"></i>
                            <div class="details">
                                <span class="name">${fileName} • Uploaded</span>
                                <span class="size">70 KB</span>
                            </div>
                        </div>
                        <i class="fas fa-check"></i>
                    </li>`;
                uploadedArea.innerHTML = uploadedHTML;
            } else {
                console.error(`File upload failed with status ${xhr.status}.`);
                // Add code to handle errors or display an error message
            }
        });

        // Set up an error listener
        xhr.addEventListener("error", () => {
            console.error(`An error occurred during file upload.`);
            // Add code to handle errors or display an error message
        });

        // Set up a progress listener
        xhr.upload.addEventListener("progress", (e) => {
            if (e.lengthComputable) {
                let percentComplete = (e.loaded / e.total) * 100;
                console.log(`Uploading ${fileName}: ${percentComplete.toFixed(2)}%`);

                // Update the progress bar dynamically
                progressArea.innerHTML = `
                    <li class="row">
                        <i class="fa fas fa-file-alt"></i>
                        <div class="content">
                            <div class="details">
                                <span class="name">${fileName} • Uploading</span>
                                <span class="percent">${percentComplete.toFixed(2)}%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress" style="width: ${percentComplete}%"></div>
                            </div>
                        </div>
                    </li>`;
            }
        });

        // Send the FormData with the file
        xhr.send(formData);
    }
});
