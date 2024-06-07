document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".item");

    items.forEach(item => {
        // Store the original background color in a data attribute
        item.dataset.bgcolor = getComputedStyle(item).backgroundColor;

        item.addEventListener("mouseover", function () {
            switch (item.classList[1]) {
                case 'web':
                    item.style.backgroundImage = "url('https://i.ibb.co/DzddxPJ/2024-06-07-145734.png')";
                    break;
                case 'app':
                    item.style.backgroundImage = "url('https://i.ibb.co/j3C6TpC/app.png')";
                    break;
                case 'data':
                    item.style.backgroundImage = "url('https://i.ibb.co/qByNz5x/data.png')";
                    break;
                case 'ai':
                    item.style.backgroundImage = "url('https://i.ibb.co/VgLh6Y8/ai.png')";
                    break;
                default:
                    break;
            }
            item.style.backgroundSize = 'contain';
            item.style.backgroundRepeat = 'no-repeat';
            item.style.backgroundPosition = 'center';
            item.style.backgroundColor = 'white'; // Set background color to white
            item.style.color = 'transparent'; // Make text color transparent
        });

        item.addEventListener("mouseout", function () {
            item.style.backgroundImage = "";
            item.style.backgroundColor = item.dataset.bgcolor; // Reset background color to original
            item.style.color = 'rgb(129, 115, 184)'; // Reset text color to original
        });

        item.addEventListener("click", function () {
            switch (item.classList[1]) {
                case 'web':
                    window.location.href = 'web/web.html';
                    break;
                case 'app':
                    window.location.href = 'app.html';
                    break;
                case 'data':
                    window.location.href = 'data.html';
                    break;
                case 'ai':
                    window.location.href = 'ai.html';
                    break;
                default:
                    break;
            }
        });

    });
});
