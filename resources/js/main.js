const navigationExists = document.querySelector('.may-navigation');

if (navigationExists) {
    const sideNav = document.getElementById('docNav');
    const ulElement = sideNav.querySelector('ul');
    ulElement.classList.add('list-none');
    ulElement.style = 'padding: 5px';
    const ulElements = ulElement.querySelectorAll('li ul');
    ulElements.forEach((ulElements) => {
        ulElements.classList.add('border-l', 'border-transparent', 'border-slate-300', 'border-l-2');
    });
    const anchorElements = ulElement.querySelectorAll('li ul li a');

    anchorElements.forEach((anchorElement) => {
        anchorElement.classList.add('flex', 'justify-between', 'gap-2', 'py-1', 'pr-3', 'text-sm', 'transition', 'pl-4', 'text-zinc-900', 'dark:text-white');
    });
}


