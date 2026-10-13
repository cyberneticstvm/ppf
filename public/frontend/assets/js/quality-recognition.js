(() => {
    const form = document.getElementById('quality-recognition-form');
    if (!form) return;
    const button = document.getElementById('qr-submit');
    const review = document.getElementById('qr-review');
    const content = document.getElementById('qr-review-content');
    let reviewed = false;
    button.textContent = 'Review & prepare submission';
    const edit = () => {
        if (form.getAttribute('aria-busy') === 'true') return;
        reviewed = false;
        review.hidden = true;
        button.textContent = 'Review & prepare submission';
    };
    form.addEventListener('input', edit);
    form.addEventListener('change', edit);
    document.getElementById('qr-edit').addEventListener('click', () => {
        edit();
        document.getElementById('quality_meaning').focus();
    });
    form.addEventListener('submit', event => {
        if (reviewed) {
            return;
        }
        event.preventDefault();
        content.replaceChildren();
        form.querySelectorAll('textarea, input:not([type=hidden]):not([type=checkbox])').forEach(input => {
            const label = form.querySelector(`label[for="${input.id}"]`);
            const title = document.createElement('dt');
            title.textContent = label ? label.textContent.trim() : input.name;
            const answer = document.createElement('dd');
            answer.textContent = input.value.trim() || 'Not provided';
            content.append(title, answer);
        });
        const addReview = (label, value) => {
            const title = document.createElement('dt');
            title.textContent = label;
            const answer = document.createElement('dd');
            answer.textContent = value;
            content.append(title, answer);
        };
        addReview('Possible evidence', [...form.querySelectorAll('input[name="evidence_types[]"]:checked')].map(input => input.value).join(', ') || 'None selected');
        addReview('Follow-up consent', form.elements.follow_up_consent.checked ? 'Yes' : 'No');
        addReview('Best-practice sharing consent', form.elements.sharing_consent.checked ? 'Yes' : 'No');
        reviewed = true;
        review.hidden = false;
        button.textContent = 'Confirm & submit entry';
        review.focus();
        review.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
    document.getElementById('qr-errors')?.focus();
    window.addEventListener('pageshow', event => { if (event.persisted) edit(); });
})();
