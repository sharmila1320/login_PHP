document.querySelector('.login-btn-modal').onclick = () => {
    document.querySelector('.auth-modal').classList.add('show');
    document.querySelector('.auth-modal').classList.remove('slide');
};

document.querySelectorAll('.register-link').forEach(link => {
    link.onclick = () => {
        document.querySelector('.auth-modal').classList.add('slide');
    };
});

document.querySelectorAll('.login-link').forEach(link => {
    link.onclick = () => {
        document.querySelector('.auth-modal').classList.remove('slide');
    };
});

document.querySelector('.close-btn-modal').onclick = () => {
    document.querySelector('.auth-modal').classList.remove('show');
};
