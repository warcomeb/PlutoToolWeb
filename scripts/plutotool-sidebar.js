document.write(
'<ul class="list-unstyled ps-0">\
    <li class="mb-1">\
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">\
        Home\
        </button>\
        <div class="collapse show" id="home-collapse">\
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">\
                <li><a href="index.html" class="link-dark rounded">Dashboard</a></li>\
                <li><a href="reports.html" class="link-dark rounded">Report</a></li>\
            </ul>\
        </div>\
    </li>\
    <li class="mb-1">\
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#records-collapse" aria-expanded="false">\
        Anagrafica\
        </button>\
        <div class="collapse" id="records-collapse">\
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">\
                <li><a href="account.html" class="link-dark rounded">Portafogli</a></li>\
                <li><a href="payee.html" class="link-dark rounded">Beneficiari</a></li>\
                <li><a href="workorder.html" class="link-dark rounded">Commesse</a></li>\
                <li><a href="user.html" class="link-dark rounded">Utenti</a></li>\
            </ul>\
        </div>\
    </li>\
</ul>');