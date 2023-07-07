const btnPlusAll = document.querySelectorAll('.btn-plus');

btnPlusAll.forEach(function(btnPlus) {
    const btnText = btnPlus.querySelector('.btn-text');
    const btnHover = btnPlus.querySelector('.btn-hover');
    let hoverTimeout;

    btnPlus.addEventListener('mouseover', function() {
        btnText.style.display = 'none';
        btnPlus.style.width = '160px';
        btnPlus.style.borderRadius = '30px';
        hoverTimeout = setTimeout(function(){
            btnHover.style.display = 'block';
        }, 100);
    });

    btnPlus.addEventListener('mouseout', function() {
        clearTimeout(hoverTimeout)
        btnText.style.display = 'block';
        btnPlus.style.width = '10px';
        btnPlus.style.borderRadius = '50%';
        btnHover.style.display = 'none';
    });
});

const btnHoverAll = document.querySelectorAll('.btn-hover');

btnHoverAll.forEach(function (btnHover) {
    btnHover.addEventListener('mouseover', function() {
        btnHover.style.display = 'block';
    });

    btnHover.addEventListener('mouseout', function(){
        btnHover.style.display = 'none';
    });
});