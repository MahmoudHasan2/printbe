document.addEventListener('DOMContentLoaded', () => {

  const list = document.getElementById('repeaterList');
  const template = document.getElementById('repeaterTemplate');
  const addBtn = document.getElementById('addRowBtn');

  if (list && template && addBtn) {
    addBtn.addEventListener('click', () => {
      const nextIndex = parseInt(list.dataset.nextIndex || '0', 10);
      const clone = template.content.cloneNode(true);
      // swap the __IDX__ placeholder for a real, unused index in every name attribute
      clone.querySelectorAll('[name]').forEach(el => {
        el.setAttribute('name', el.getAttribute('name').replace('__IDX__', nextIndex));
      });
      const row = clone.querySelector('.repeater-row');
      if (row) row.dataset.idx = nextIndex;
      list.appendChild(clone);
      list.dataset.nextIndex = nextIndex + 1;
      list.lastElementChild.scrollIntoView({ behavior: 'smooth', block: 'center' });
    });
  }

  // event delegation: remove-row works for rows present at load AND rows added later
  document.addEventListener('click', (e) => {
    const btn = e.target.closest('.remove-row');
    if (!btn) return;
    const row = btn.closest('.repeater-row');
    if (row && confirm('Remove this item?')) row.remove();
  });

  // live preview when a new image file is chosen
  document.addEventListener('change', (e) => {
    if (!e.target.classList || !e.target.classList.contains('file-input')) return;
    const file = e.target.files && e.target.files[0];
    if (!file) return;
    const wrap = e.target.closest('.image-field');
    const img = wrap ? wrap.querySelector('.thumb-preview') : null;
    if (img) {
      const reader = new FileReader();
      reader.onload = (ev) => { img.src = ev.target.result; img.style.visibility = 'visible'; };
      reader.readAsDataURL(file);
    }
  });

  // keep row title in sync while typing the item's "label" field (first text input in the row)
  document.addEventListener('input', (e) => {
    const row = e.target.closest('.repeater-row');
    if (!row) return;
    const firstTextInput = row.querySelector('.repeater-row-fields input[type=text]');
    if (firstTextInput && e.target === firstTextInput) {
      const titleEl = row.querySelector('.row-title');
      if (titleEl) titleEl.textContent = firstTextInput.value || 'New Item';
    }
  });

});
