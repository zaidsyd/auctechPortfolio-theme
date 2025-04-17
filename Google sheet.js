document.addEventListener('DOMContentLoaded', () => {
    const scriptURL = 'https://script.google.com/macros/s/AKfycbxKV-5ILRcEjOn_N542MsWithWsgu3q29g4WVQ7x90IdBeOQFs9nr18gLJ2NUDVTYtvww/exec'
    const form = document.getElementById('demoForm')
    const submitBtn = document.getElementById('submit')
  
    form.addEventListener('submit', e => {
      e.preventDefault()
  
      const name = form['Name'].value.trim()
      const phone = form['Phone Number'].value.trim()
      const email = form['Email'].value.trim()
      const message = form['Message'].value.trim()
  
      if (!name || !phone || !email || !message || !/^\d{10}$/.test(phone)) {
        Swal.fire({
          icon: 'warning',
          title: 'Invalid Input',
          text: 'Please fill all fields correctly (Mobile must be 10 digits).'
        })
        return
      }
  
      submitBtn.disabled = true
      submitBtn.innerText = 'Submitting...'
  
      fetch(scriptURL, { method: 'POST', body: new FormData(form) })
        .then(() => {
          Swal.fire({ icon: 'success', title: 'Thank you!', text: 'Your form has been submitted successfully.' })
          form.reset()
        })
        .catch(() => {
          Swal.fire({ icon: 'error', title: 'Error', text: 'Something went wrong!' })
        })
        .finally(() => {
          submitBtn.disabled = false
          submitBtn.innerText = 'Submit'
        })
    })
  })