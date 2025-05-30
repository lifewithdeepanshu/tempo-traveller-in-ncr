// Function to add the sticky call & WhatsApp buttons
function addStickyButtons() {
  // Create the container div
  const container = document.createElement('div');
  container.classList.add('fixed', 'bottom-4', 'right-4', 'z-50', 'flex', 'flex-col', 'gap-3');
  
  // Create the Call button
  const callButton = document.createElement('a');
  callButton.setAttribute('href', 'tel:+919999029051');
  callButton.setAttribute('target', '_blank');
  callButton.classList.add('bg-green-600', 'hover:bg-green-700', 'text-white', 'rounded-full', 'shadow-lg', 'w-14', 'h-14', 'flex', 'items-center', 'justify-center', 'text-2xl', 'transition', 'transform', 'hover:scale-110');
  callButton.innerHTML = '<i class="bi bi-telephone-fill"></i>';
  
  // Create the WhatsApp button
  const whatsappButton = document.createElement('a');
  whatsappButton.setAttribute('href', 'https://wa.me/919999029051');
  whatsappButton.setAttribute('target', '_blank');
  whatsappButton.classList.add('bg-green-500', 'hover:bg-green-600', 'text-white', 'rounded-full', 'shadow-lg', 'w-14', 'h-14', 'flex', 'items-center', 'justify-center', 'text-2xl', 'transition', 'transform', 'hover:scale-110');
  whatsappButton.innerHTML = '<i class="bi bi-whatsapp"></i>';
  
  // Append buttons to the container
  container.appendChild(callButton);
  container.appendChild(whatsappButton);
  
  // Append the container to the body
  document.body.appendChild(container);
}
  
// Run the function when the page loads
window.addEventListener('DOMContentLoaded', addStickyButtons);
  