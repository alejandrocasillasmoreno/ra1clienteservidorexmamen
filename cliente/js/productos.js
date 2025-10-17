document.addEventListener('DOMContentLoaded', async () => {
  const contenedor = document.getElementById('contenedor-productos');
  const productos = await obtenerProductos();

  productos.forEach(p => {
    const card = document.createElement('div');
    card.className = "col-md-4";
    card.innerHTML = `
      <div class="card h-100 shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">${p.nombre}</h5>
          <p class="card-text">${p.descripcion}</p>
          <p class="categoria">${p.categoria}</p>
          <p class="fw-bold">${p.precio.toFixed(2)} €</p>
          <img class="img">${p.img}"</img>
          <a href="producto.html?id=${p.id}" class="btn btn-primary">Ver detalle</a>
        </div>
      </div>
    `;
    
    // Añadir estilos a la tarjeta
    const cambio1 = card.querySelector('.card');
    const cambio2 = card.querySelector('.card-title');
    const cambio3 = card.querySelector('.card-text');

    // Estilos para .card
    cambio1.style.backgroundColor = '#000000';
    cambio1.style.fontSize = '15px';
    cambio1.style.color = '#ffffff';

    // Estilos para .card-title
    cambio2.style.fontSize = '10px';
    cambio2.style.color = '#0d6efd';
    cambio2.style.backgroundColor = '#ffffff';

    // Estilos para .card-text
    cambio3.style.fontSize = '15px';
    cambio3.style.color = '#000000';
    cambio3.style.backgroundColor = '#ffffff';
    contenedor.appendChild(card);
  });
});
