document.addEventListener("DOMContentLoaded", function () {
    const boxes = document.querySelectorAll(".box");
    const sidebar = document.querySelector(".sidebar .content");

    boxes.forEach(box => {
        box.addEventListener("click", function () {
            const content = this.getAttribute("data-content");
            sidebar.innerHTML = `<h2>${this.querySelector("p").textContent}</h2><p>${content}</p>`;
        });
    });

    // OUTER VERTICAL LINES
    function outerVertical(side, connectorDirection) {
        var connector = '.connector-' + connectorDirection;

        document.querySelectorAll('.' + side + ' .module').forEach(module => {
            var numModules = document.querySelectorAll('.' + side + ' .module').length;
            var top = module.querySelector('.outer .box:first-child ' + connector).getBoundingClientRect().top;
            var bottom = module.querySelector('.outer .box:last-child ' + connector).getBoundingClientRect().top;

            module.querySelector('.connector-vertical-outer').style.top = (top - 20) + 'px';
            module.querySelector('.connector-vertical-outer').style.height = (bottom - top) + 'px';
        });
    }

    // INNER VERTICAL LINES
    function innerVertical(side) {
        var numModules = document.querySelectorAll('.' + side + ' .module').length;
        var top = document.querySelector('.' + side + ' .inner:first-child .box').getBoundingClientRect().top;
        var bottom = document.querySelector('.' + side + ' .inner:last-child .box').getBoundingClientRect().top;

        document.querySelector('.' + side + ' .connector-vertical-inner').style.top = (top - numModules) + 'px';
        document.querySelector('.' + side + ' .connector-vertical-inner').style.height = (bottom - top) + 'px';
    }

    outerVertical('left', 'right');
    outerVertical('right', 'left');
    innerVertical('left');
    innerVertical('right');
});
