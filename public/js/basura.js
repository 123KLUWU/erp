// MODAL AGREGAR
const modalAgregar = document.getElementById("modalAgregar");
const modalAgregarTitulo = document.getElementById("modalAgregarTitulo");
const modalAgregarCampos = document.getElementById("modalAgregarCampos");
const formAgregar = document.getElementById("formAgregar");
const guardarAgregarBtn = document.getElementById("guardarAgregar");
const cancelarAgregarBtn = document.getElementById("cancelarAgregar");
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Obtener el token CSRF

document.querySelectorAll('.agregar-opcion').forEach(button => {
    // ... (código existente) ...
});

guardarAgregarBtn.addEventListener('click', () => {
    const rutaAgregar = formAgregar.dataset.rutaAgregar;
    const selectId = formAgregar.dataset.selectId;
    const data = {
        _token: csrfToken, // Usar el token CSRF obtenido del meta tag
    };

    // ... (resto del código) ...
});

cancelarAgregarBtn.addEventListener("click", () => {
    modalAgregar.close();
});

// MODAL EDITAR
const modalEditar = document.getElementById("modalEditar");
const modalEditarTitulo = document.getElementById("modalEditarTitulo");
const modalEditarCampos = document.getElementById("modalEditarCampos");
const formEditar = document.getElementById("formEditar");
const guardarEditarBtn = document.getElementById("guardarEditar");
const cancelarEditarBtn = document.getElementById("cancelarEditar");
const opcionIdEditar = document.getElementById("opcionIdEditar");

document.querySelectorAll('.editar-opcion').forEach(button => {
    // ... (código existente) ...
});

guardarEditarBtn.addEventListener('click', () => {
    const rutaEditar = formEditar.dataset.rutaEditar;
    const selectId = formEditar.dataset.selectId;
    const data = {
        opcionId: opcionIdEditar.value,
        _token: csrfToken, // Usar el token CSRF obtenido del meta tag
    };

    // ... (resto del código) ...
});

cancelarEditarBtn.addEventListener("click", () => {
    modalEditar.close();
});

