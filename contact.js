document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const formData = new FormData(event.target);

    // Convert form data to JSON object
    const jsonObject = {};
    formData.forEach((value, key) => {
        jsonObject[key] = value;
    });

    // Send the form data to the PHP backend using AJAX
    fetch("send_email.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(jsonObject),
    })
    .then(response => response.json())
    .then(data => {
        // Handle the response from the server
        alert(data.message);
    })
    .catch(error => {
        console.error("Error:", error);
    });
});
