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
    // pass 'left' or 'right' to side
    // pass opposite direction do connectorDirection
    function outerVertical(side, connectorDirection) {
        var connector = '.connector-' + connectorDirection

        $('.' + side + ' .module').each(function () {
            var $numModules = $('.' + side + ' .module').length;
            var $top = $(this).find('.outer .box:first ' + connector).offset().top;
            var $bottom = $(this).find('.outer .box:last ' + connector).offset().top;
            var $innerHeight = $(this).height();

            $(this).find('.connector-vertical-outer').css({
                'top': ($top - 20) + 'px',
                'height': ($bottom - $top) + 'px'
            });

        });
    }

    // INNER VERTICAL LINES
    function innerVertical(side) {
        var $numModules = $('.' + side + ' .module').length;
        var $top = $('.' + side + ' .inner:first .box').offset().top;
        var $bottom = $('.' + side + ' .inner:last .box').offset().top;
        var $innerHeight = $('.' + side).height();

        $('.' + side + ' .connector-vertical-inner').css({
            'top': ($top - $numModules) + 'px',
            'height': ($bottom - $top) + 'px'
        });
    }

    outerVertical('left', 'right');
    outerVertical('right', 'left');
    innerVertical('left');
    innerVertical('right');
});
