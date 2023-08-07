document.getElementById('contactForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    const formData = {
        name,
        email,
        message
    };

    try {
        const response = await fetch('/send-email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        });

        const data = await response.json();
        alert(data.message);
        // You can redirect the user to a "thank you" page or clear the form here.
    } catch (error) {
        alert('An error occurred. Please try again later.');
        console.error(error);
    }
});
