
fillTable();
fillSelect();

const table  = document.querySelector('#datos');
const select = document.querySelector('#etiqueta_id');
const menu   = document.querySelector('#menu-dinamico');
const form   = document.querySelector('#form-menu');

const nombre      = document.querySelector('#nombre');
const ico         = document.querySelector('#ico');
const etiqueta_id = document.querySelector('#etiqueta_id');
const hidden_id   = document.querySelector('#hidden_id');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    const data = {
        "nombre": document.querySelector('#nombre').value,
        "ico": document.querySelector('#ico').value,
        "etiqueta_id": document.querySelector('#etiqueta_id').value,
        "hidden_id": document.querySelector('#hidden_id').value,
    };

    if(hidden_id.value != 0){
        update(data);
        hidden_id.value = '0';
    }else {
        insert(data);
    }

});

function fillSelect() {

    fetch('/api/etiquetas')
    .then( resp => resp.json() )
    .then( data => {

        const etiqueta = data.data;
        select.innerHTML += ` <option>Seleccionar...</option> `;
        etiqueta.forEach( item => {
            select.innerHTML += `
                <option value="${item.id}">${item.nombre}</option>
            `;
        });

    })
}

function fillTable() {

    fetch('/api/menu')
    .then( resp => resp.json() )
    .then( data => {

        const datos = data.data;

        datos.forEach( items => {
            table.innerHTML += dataTable(items);
        });

    })

}

function dataTable(data) {
    return `
    <tr>
        <td>${data.nombre}</td>
        <td>
            <i class='${data.ico}'></i>
        </td>
        <td>${data.categoria}</td>
        <td>
            <a class="action" onclick="edit(${data.id})"/>
                <i class="fa fa-edit"></i>
            </a>
            <a class="action" onclick="del(${data.id})"/>
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
    `;
}

function insert(data) {

    fetch('/api/insert', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(resp => resp.json() )
    .then(data => {
        Swal.fire({
            icon: 'success',
            title: 'Se agrego un nuevo lemento.',
            showConfirmButton: false,
            timer: 1500
        });
        table.innerHTML = '';
        menu.innerHTML = "";
        fillTable();
        getMenu();
        form.reset();
    });

}

function update(data) {

    fetch('/api/update', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(resp => resp.json() )
    .then(data => {
        Swal.fire({
            icon: 'success',
            title: 'Elemento actualizado.',
            showConfirmButton: false,
            timer: 1500
        });
        table.innerHTML = '';
        menu.innerHTML = "";
        select.innerHTML = "";
        fillTable();
        fillSelect();
        getMenu();
        form.reset();
    });

}

function edit(id) {

    fetch(`/api/edit/${id}`)
    .then( resp => resp.json() )
    .then( data =>{

        const form_data = data.data;
        nombre.value    = form_data[0].nombre;
        ico.value       = form_data[0].ico;
        etiqueta_id.innerHTML = `<option value="${form_data[0].id}"> ${form_data[0].categoria} </option>`
        hidden_id.value       = form_data[0].id;
    });
    select.innerHTML = '';
    fillSelect();
}

function del(id) {
    fetch(`/api/delete/${id}`, {
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json'
        },
        body: null
    })
    .then( resp => resp.json() )
    .then( resp => {
        Swal.fire({
            icon: 'success',
            title: 'Elemento eliminado.',
            showConfirmButton: false,
            timer: 1500
        });
        table.innerHTML = '';
        menu.innerHTML = "";
        fillTable();
        getMenu();
    })
}




