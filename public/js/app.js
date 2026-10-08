(() => {
    const sidebar = document.getElementById('sidebar');
    const menuButton = document.getElementById('menuButton');
    const scrim = document.getElementById('sidebarScrim');

    const setSidebar = (open) => {
        if (!sidebar || !menuButton || !scrim) return;
        sidebar.classList.toggle('open', open);
        scrim.classList.toggle('visible', open);
        menuButton.setAttribute('aria-expanded', String(open));
        document.body.style.overflow = open ? 'hidden' : '';
    };

    menuButton?.addEventListener('click', () => setSidebar(!sidebar.classList.contains('open')));
    scrim?.addEventListener('click', () => setSidebar(false));
    window.addEventListener('resize', () => {
        if (window.innerWidth > 780) setSidebar(false);
    });

    const userMenuButton = document.getElementById('userMenuButton');
    const userDropdown = document.getElementById('userDropdown');

    const setUserMenu = (open) => {
        if (!userMenuButton || !userDropdown) return;
        userDropdown.hidden = !open;
        userMenuButton.setAttribute('aria-expanded', String(open));
    };

    userMenuButton?.addEventListener('click', (event) => {
        event.stopPropagation();
        setUserMenu(userDropdown.hidden);
    });
    document.addEventListener('click', (event) => {
        if (userDropdown && !userDropdown.contains(event.target)) setUserMenu(false);
    });

    document.querySelectorAll('[data-password-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            const wrapper = button.closest('.password-field, .input-with-icon');
            const input = wrapper?.querySelector('input');
            if (!input) return;
            const reveal = input.type === 'password';
            input.type = reveal ? 'text' : 'password';
            button.setAttribute('aria-label', reveal ? 'Hide password' : 'Show password');
        });
    });

    document.querySelectorAll('[data-avatar-input]').forEach((input) => {
        const form = input.closest('form');
        const preview = form?.querySelector('[data-avatar-preview]');
        const remove = form?.querySelector('[data-remove-avatar]');
        if (!preview) return;

        input.addEventListener('change', () => {
            const file = input.files?.[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                input.value = '';
                return;
            }

            const url = URL.createObjectURL(file);
            preview.innerHTML = '';
            const image = document.createElement('img');
            image.src = url;
            image.alt = 'Selected photo preview';
            image.addEventListener('load', () => URL.revokeObjectURL(url), { once: true });
            preview.appendChild(image);
            if (remove) remove.checked = false;
        });

        remove?.addEventListener('change', () => {
            preview.style.opacity = remove.checked ? '.35' : '1';
            if (remove.checked) input.value = '';
        });
    });

    document.querySelectorAll('[data-table-search]').forEach((input) => {
        const tableId = input.getAttribute('data-table-search');
        const table = document.getElementById(tableId);
        const empty = document.querySelector(`[data-table-empty="${tableId}"]`);
        const count = input.closest('.directory-toolbar')?.querySelector('[data-record-count]');
        if (!table) return;

        input.addEventListener('input', () => {
            const query = input.value.trim().toLowerCase();
            let visible = 0;
            table.querySelectorAll('tbody tr').forEach((row) => {
                const matches = row.textContent.toLowerCase().includes(query);
                row.hidden = !matches;
                if (matches) visible += 1;
            });
            if (count) count.textContent = String(visible);
            if (empty) empty.classList.toggle('is-hidden', visible !== 0);
        });
    });

    document.querySelectorAll('form[data-confirm]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            if (!window.confirm(form.getAttribute('data-confirm'))) event.preventDefault();
        });
    });
})();
