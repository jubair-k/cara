document.addEventListener('DOMContentLoaded',function(){
    function loadProductsTable(){
        let formData = new FormData();
        formData.append('loadProducts','post');
        fetch('assets/process/product-process.php', {
            method: 'post',
            body: formData,
        })
        .then( res => res.json())
        .then( data => {
            console.log(data);
            $('#productTable').DataTable({
                processing: true,
                data: data.prdct,
                columns: [
                    { data: 'categories' },
                    { data: 'sub_categories' },
                    { data: 'product_name' },
                    {
                        data: 'image', "render": function (data) {
                            return `<img src="../media/products/${data}" style="height:60px;width:60px;"/>`;
                        }
                    },
                    { data: 'mrp' },
                    { data: 'price' },
                    { data: 'qty' },
                    {mRender: function ( data, type, row ) {
                        if(row.status=='1'){
                            return '<button data-id="' + row.id + '" class="status_active stbtn">Active</button> <button data-id="' + row.id + '" class="edite_prdct">Edit</button> <button data-id="' + row.id + '" class="delete_prdct">Delete</button>';
                        } else{
                            return '<button data-id="' + row.id + '" class="status_deactive stbtn">Active</button> <button data-id="' + row.id + '" class="edite_prdct">Edit</button> <button data-id="' + row.id + '" class="delete_prdct">Delete</button>';
                        }
                        }
                    }
                ],
            });
        

        })
    }

    loadProductsTable()



})