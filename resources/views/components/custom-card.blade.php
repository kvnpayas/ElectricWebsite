<div
  class="card group relative bg-white rounded-2xl p-7 border cursor-pointer transition-[box-shadow,border-color,transform] duration-300"
  style="border-color: rgba(15,61,92,0.09); box-shadow: 0 2px 12px rgba(15,61,92,0.06);"
  onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 20px 48px rgba(15,61,92,0.13)'; this.style.borderColor='rgba(231,103,39,0.22)'"
  onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 12px rgba(15,61,92,0.06)'; this.style.borderColor='rgba(15,61,92,0.09)'">

  {{ $slot }}

  <div
    class="absolute bottom-0 left-6 right-6 h-0.5 rounded-full transition-all duration-300 opacity-0 group-hover:opacity-100 bg-gradient-to-r from-tei-orange to-transparent"></div>
</div>
