
getMenu();


function getMenu() {
    fetch('api/menu')
    .then( resp => resp.json() )
    .then( data => {

        const menu = document.querySelector('#menu-dinamico');
        const items     = data.data;
        const categorias = [];

        // Filtrar todas las categorias
        items.forEach( categoria => {
            categorias.push( categoria.categoria );
        });

        // Filtrar los items repetidos
        const categorias_filtradas = categorias.filter( (item, index) => {
            return categorias.indexOf(item) == index;
        });

        menu.innerHTML = "";
        categorias_filtradas.forEach(categoria => {
            menu.innerHTML += `
                <hr class="sidebar-divider">
                <div class='sidebar-heading'>${categoria}</div>
            `;
            for (let i = 0; i < items.length; i++) {
                if (categoria == items[i].categoria) {
                    menu.innerHTML += `
                    <li class='nav-item'>
                    <a href='javascript:void();' class='nav-link'>
                        <i class='${items[i].ico}'></i>
                        <span>${items[i].nombre}</span>
                    </a>
                </li>
                    `;
                }
            }
        });


    });
}

