<script>
document.getElementById('categoryForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("{{ route('add.category') }}", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {

        if(data.success){
            loadCategories();
            this.reset();
        }

        alert(data.message);
    });
});


function loadCategories(){
    fetch("{{ route('get.categories') }}")
    .then(response => response.json())
    .then(data => {
        let list = '';
        let options = '<option value="">--Select--</option>';

        data.forEach(cat => {
            list += `<li class="list-group-item">${cat.name}</li>`;
            options += `<option value="${cat.name}">${cat.name}</option>`;
        });

        document.getElementById('categoryList').innerHTML = list;
        document.getElementById('productCategory').innerHTML = options;
    });
}

loadCategories();
</script>
