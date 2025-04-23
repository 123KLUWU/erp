document.addEventListener("DOMContentLoaded", function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    //MODAL AGREGAR
    document.querySelectorAll('.agregar-opcion').forEach(button => {
        button.addEventListener('click', () => {
            const modal = new bootstrap.Modal(document.getElementById('modalAgregar'));
            const modalAgregarCampos = document.getElementById("modalAgregarCampos");
            modalAgregarCampos.innerHTML = ''; 

            const campos = JSON.parse(button.dataset.campos);
            const modalTitle = button.dataset.modalTitle;
            document.getElementById("modalAgregarTitulo").textContent = `Agregar ${modalTitle}`;

            campos.forEach(campo => {
                const div = document.createElement('div');
                div.classList.add('mb-3');

                const label = document.createElement('label');
                label.textContent = campo;
                label.classList.add('form-label');

                const input = document.createElement('input');
                input.type = 'text';
                input.name = campo;
                input.classList.add('form-control');

                div.appendChild(label);
                div.appendChild(input);
                modalAgregarCampos.appendChild(div);
            });

            document.getElementById("guardarAgregar").dataset.rutaAgregar = button.dataset.rutaAgregar;

            modal.show();
        });
    });

    document.getElementById("guardarAgregar").addEventListener("click", () => {
        const modalElement = document.getElementById('modalAgregar');
        const modalInstance = bootstrap.Modal.getInstance(modalElement);
        const rutaAgregar = document.getElementById("guardarAgregar").dataset.rutaAgregar;

        const data = { _token: csrfToken };
        document.querySelectorAll('#modalAgregarCampos input').forEach(input => {
            data[input.name] = input.value;
        });

        fetch(rutaAgregar, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert("Opción agregada con éxito");
                location.reload(); // 🔄 Recargar la página para ver los cambios en el select
                modalInstance.hide();
            } else {
                alert("Error al agregar.");
            }
        })
        .catch(error => console.error("Error:", error));
    });

    //MODAL EDITAR
    document.querySelectorAll('.editar-opcion').forEach(button => {
        button.addEventListener('click', () => {
            const modal = new bootstrap.Modal(document.getElementById('modalEditar'));
            const modalEditarCampos = document.getElementById("modalEditarCampos");
            modalEditarCampos.innerHTML = ''; 

            const select = document.getElementById(button.dataset.selectId);
            const opcionSeleccionada = select.options[select.selectedIndex];

            if (!opcionSeleccionada.value) {
                alert('Por favor selecciona una opción para editar.');
                return;
            }

            const campos = JSON.parse(button.dataset.campos);
            const modalTitle = button.dataset.modalTitle;
            document.getElementById("modalEditarTitulo").textContent = `Editar ${modalTitle}`;
            document.getElementById("opcionIdEditar").value = opcionSeleccionada.value;

            campos.forEach(campo => {
                const div = document.createElement('div');
                div.classList.add('mb-3');

                const label = document.createElement('label');
                label.textContent = campo;
                label.classList.add('form-label');

                const input = document.createElement('input');
                input.type = 'text';
                input.name = campo;
                input.classList.add('form-control');
                input.value = opcionSeleccionada.textContent.split('(')[0].trim(); 

                div.appendChild(label);
                div.appendChild(input);
                modalEditarCampos.appendChild(div);
            });

            document.getElementById("guardarEditar").dataset.rutaEditar = button.dataset.rutaEditar;
            document.getElementById("guardarEditar").dataset.selectId = button.dataset.selectId;

            modal.show();
        });
    });

    document.getElementById("guardarEditar").addEventListener("click", () => {
        const modalElement = document.getElementById('modalEditar');
        const modalInstance = bootstrap.Modal.getInstance(modalElement);
        const rutaEditar = document.getElementById("guardarEditar").dataset.rutaEditar;
        const selectId = document.getElementById("guardarEditar").dataset.selectId;
        const opcionId = document.getElementById("opcionIdEditar").value;

        const data = { _token: csrfToken, opcionId };
        document.querySelectorAll('#modalEditarCampos input').forEach(input => {
            data[input.name] = input.value;
        });

        fetch(rutaEditar, {
            method: "PUT",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert("Opción editada con éxito");
                location.reload(); // 🔄 Recargar la página para actualizar el select
                modalInstance.hide();
            } else {
                alert("Error al editar.");
            }
        })
        .catch(error => console.error("Error:", error));
    });
});