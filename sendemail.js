document.getElementById("contactForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(event.target);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "sendEmail.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            alert(response.message);
            document.getElementById("contactForm").reset();
        }
    };
    xhr.send(new URLSearchParams(formData));
});
