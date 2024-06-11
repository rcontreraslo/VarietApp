
<script type="text/javascript">
    $(document).ready(function () {
		
        /*/////////////////////////////////////////    SCRIPTS DATATABLES ///////////////////////////////////*/	
            // datatable de varietats
			$('#dtvarietats').DataTable({
                dom: 'lBfirtp',
                buttons: [
                    { extend: 'excel',
                     title: 'Varietats'
                    }
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'Tots'],
                ],
                language: {
                    url: '/js/datatable.ca.json',
                },
                order: [[0, 'desc']],
                processing: true,
                serverSide: true,
                ajax: '/varietats',
                columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'img', name: 'img', orderable: false},
                    { data: 'name', name: 'name' },
                    { data: 'varCodi', name: 'varCodi' },
                    { data: 'especie.name', name: 'especie.name' },
                    { data: 'especie.espNomCientific', name: 'especie.espNomCientific','visible': false },
                    { data: 'especie.familie.name', name: 'especie.familie.name','visible': false },
                    { data: 'varOriAny', name: 'varOriAny','visible': false },
                    { data: 'varAnyBaixa', name:'varAnyBaixa', render: {
                        _: 'display',
                        sort: 'ordena'
                    } },
                    { data: 'actions', name: 'actions', orderable: false},
                 ],
            });


            // datable de especies
            $('#dtespecies').DataTable({
                dom: 'lBfirtp',
                buttons: [
                    { extend: 'excel',
                     title: 'Especies'
                    }
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'Tots'],
                ],
                language: {
                    url: '/js/datatable.ca.json',
                },
                order: [[0, 'desc']],
                processing: true,
                serverSide: true,
                ajax: '/especies',
                columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'name', name: 'name' },
                    { data: 'familie.name', name: 'familie.name' },
                    { data: 'espCodi', name: 'espCodi' },
                    { data: 'actions', name: 'actions', orderable: false},
                 ],
            });


            // datable de families
           $('#dtfamilies').DataTable({
                dom: 'lBfirtp',
                buttons: [
                    { extend: 'excel',
                     title: 'Families'
                    }
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'Tots'],
                ],
                language: {
                    url: '/js/datatable.ca.json',
                },
                order: [[0, 'desc']],
                processing: true,
                serverSide: true,
                ajax: '/families',
                columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'name', name: 'name' },
                    { data: 'actions', name: 'actions', orderable: false},
                 ],
            });


           // datable de municipis
            $('#dtmunicipis').DataTable({
                dom: 'lfirtp',
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'Tots'],
                ],
                language: {
                    url: '/js/datatable.ca.json',
                },
                order: [[0, 'asc']],
                processing: true,
                serverSide: true,
                ajax: '/municipis',
                columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'name', name: 'name' },
                    { data: 'munIlla', name: 'munIlla' },
                    { data: 'provincie.name', name: 'provincie.name' },
                    { data: 'munPais', name: 'munPais' },
                    { data: 'actions', name: 'actions', orderable: false},
                 ],
            });


            // datable de provincies
             $('#dtprovincies').DataTable({
                dom: 'lfirtp',
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'Tots'],
                ],
                language: {
                    url: '/js/datatable.ca.json',
                },
                order: [[0, 'desc']],
                processing: true,
                serverSide: true,
                ajax: '/provincies',
                columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'name', name: 'name' },
                    { data: 'actions', name: 'actions', orderable: false},
                 ],
            });
    

             // datable de persones
              $('#dtpersones').DataTable({
                dom: 'lBfirtp',
                buttons: [
                    'excel'
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'Tots'],
                ],
                language: {
                    url: '/js/datatable.ca.json',
                },
                order: [[0, 'desc']],
                processing: true,
                serverSide: true,
                ajax: '/persones',
                columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'name', name: 'name' },
                    { data: 'perCognoms', name: 'perCognoms' },
                    { data: 'perEmail', name: 'perEmail' },
                    { data: 'municipi.name', name: 'municipi.name' },
                    { data: 'actions', name: 'actions', orderable: false},
                 ],
            });


            // datable de multiplicadors
              $('#dtmultiplicadors').DataTable({
                dom: 'lBfirtp',
                buttons: [
                    'excel'
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'Tots'],
                ],
                language: {
                    url: '/js/datatable.ca.json',
                },
                order: [[0, 'desc']],
                processing: true,
                serverSide: true,
                ajax: '/multiplicadors',
                columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'name', name: 'name' },
                    { data: 'mulNIF', name: 'mulNIF' },
                    { data: 'mulAdreca', name: 'mulAdreca' },
                    { data: 'mulCadastral', name: 'mulCadastral' },
                    { data: 'municipi.name', name: 'municipi.name' },
                    { data: 'actions', name: 'actions', orderable: false},
                 ],
            });  


              //datatable de mostres
              $('#dtmostres').DataTable({
                dom: 'lBfirtp',
                buttons: [
                    { extend: 'excel',
                     title: 'Mostres'
                    }
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'Tots'],
                ],
                language: {
                    url: '/js/datatable.ca.json',
                },
                order: [[0, 'desc']],
                processing: true,
                serverSide: true,
                ajax: '/mostres',
                columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'name', name: 'name' },
                    { data: 'mosCodi', name: 'mosCodi' },
                    { data: 'varietat.name', name: 'varietat.name' },
                    { data: 'mosAny', name: 'MosAny' },
                    { data: 'actions', name: 'actions', orderable: false},
                 ],
            });

               //datatable de lots
              $('#dtlots').DataTable({
                dom: 'lBfirtp',
                buttons: [
                    { extend: 'excel',
                     title: 'Mostres'
                    }
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'Tots'],
                ],
                language: {
                    url: '/js/datatable.ca.json',
                },
                order: [[0, 'desc']],
                processing: true,
                serverSide: true,
                ajax: '/mostres',
                columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'mostre_id', name: 'mostre_id' },
                    { data: 'varietat.name', name: 'varietat.name' },
                    { data: 'especie.name', name: 'especie.name' },
                    { data: 'lotCodi', name: 'lotCodi' },
                    { data: 'actions', name: 'actions', orderable: false},
                 ],
            });

               //datatable de packs
              $('#dtpacks').DataTable({
                dom: 'lBfirtp',
                buttons: [
                    { extend: 'excel',
                     title: 'Mostres'
                    }
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'Tots'],
                ],
                language: {
                    url: '/js/datatable.ca.json',
                },
                order: [[0, 'desc']],
                processing: true,
                serverSide: true,
                ajax: '/mostres',
                columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'lot.name', name: 'lot.name' },
                    { data: 'varietat.name', name: 'varietat.name' },
                    { data: 'especie.name', name: 'especie.name' },
                    { data: 'packCodi', name: 'packCodi' },
                    { data: 'actions', name: 'actions', orderable: false},
                 ],
            });
    


    /*/////////////////////////////////////////    SCRIPTS GENERALS ///////////////////////////////////*/


     /* ////////////////////   TEMPS BUTTON CERRAR AUTOMATIC  /////////////////////*/
     window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
          });
         }, 4000);
                  


    });

</script>