document.addEventListener('DOMContentLoaded', () => {
    const checkPass = document.getElementById('checkpass');
    const pass1 = document.getElementById('pass1');
    const pass2 = document.getElementById('pass2');
  
    if (checkPass) {
      const togglePasswordFields = () => {
        const display = checkPass.checked ? 'block' : 'none';
        if (pass1) pass1.style.display = display;
        if (pass2) pass2.style.display = display;
      };
  
      togglePasswordFields();
      checkPass.addEventListener('change', togglePasswordFields);
    }
  });
  