import TomSelect from 'tom-select'
import 'tom-select/dist/css/tom-select.css'

const select = document.querySelectorAll('.select')

if (select.length > 0) {
  new TomSelect('.select', {
    maxItems: 1
  })
}
