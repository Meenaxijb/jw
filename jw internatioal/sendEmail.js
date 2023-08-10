document.getElementById("contactForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(event.target);

    fetch("sendEmail.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        document.getElementById("contactForm").reset();
    })
    .catch(error => {
        console.error("Error:", error);
    });
});
