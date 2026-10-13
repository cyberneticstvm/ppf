(() => {
    const pending = new WeakMap();
    document.addEventListener('submit', event => {
        const form = event.target;
        if (!form.matches('form[data-submit-progress]')) return;
        if (pending.has(form)) {
            event.preventDefault();
            return;
        }
        // Review steps, cancelled actions and invalid forms must remain editable.
        if (event.defaultPrevented) return;
        const buttons = [...form.querySelectorAll('button.btn-submit[type="submit"], input.btn-submit[type="submit"]')];
        pending.set(form, buttons.map(button => ({ button, html: button.innerHTML, value: button.value, disabled: button.disabled })));
        form.setAttribute('aria-busy', 'true');
        buttons.forEach(button => {
            button.disabled = true;
            const label = form.dataset.submitLabel || 'Loading...';
            if (button.tagName === 'INPUT') {
                button.value = label;
            } else {
                const spinner = document.createElement('span');
                spinner.className = 'spinner-border spinner-border-sm';
                spinner.setAttribute('aria-hidden', 'true');
                button.replaceChildren(document.createTextNode(label + ' '), spinner);
            }
        });
        const status = form.querySelector('[data-submit-status]');
        if (status) status.hidden = false;
    });
    // A browser Back action can restore a page with disabled buttons from its cache.
    window.addEventListener('pageshow', () => {
        document.querySelectorAll('form[data-submit-progress]').forEach(form => {
            const state = pending.get(form);
            if (state) state.forEach(({ button, html, value, disabled }) => {
                button.disabled = disabled;
                if (button.tagName === 'INPUT') button.value = value;
                else button.innerHTML = html;
            });
            pending.delete(form);
            form.removeAttribute('aria-busy');
            const status = form.querySelector('[data-submit-status]');
            if (status) status.hidden = true;
        });
    });
})();
