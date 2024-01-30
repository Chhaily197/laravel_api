document.addEventListener("DOMContentLoaded", () => {
    const image = document.getElementById("pro_img");
    const input = document.getElementById('profile_image');

    input.addEventListener('change', (event) => {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = (e) => {
                image.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            image.src = "";
        }
    })
});