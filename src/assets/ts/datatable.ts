import * as simpleDatatables from 'simple-datatables'

const tables = document.querySelectorAll('.datatable')

if (tables.length > 0) {
  new simpleDatatables.DataTable('.datatable', {
    searchable: true,
    sortable: true,
    paging: true,
    perPage: 10,
    perPageSelect: [5, 10, 25, 50]
  })
}
