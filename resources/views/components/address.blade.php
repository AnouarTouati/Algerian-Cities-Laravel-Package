@props(['select_style','label_style'])

<label  style="{{$label_style}}" for="wilayas">{{trans('algerian-citites-laravel::translations.state')}}</label>
<select style="{{$select_style}}"  name="wilaya" id="wilayas">
</select>

<label  style="{{$label_style}}" for="dairas">{{trans('algerian-citites-laravel::translations.district')}}</label>
<select style="{{$select_style}}"  name="daira" id="dairas">
</select>

<label  style="{{$label_style}}" for="communes">{{trans('algerian-citites-laravel::translations.commune')}}</label>
<select style="{{$select_style}}"  name="commune" id="communes">
</select>

<label  style="{{$label_style}}" for="postoffices">{{trans('algerian-citites-laravel::translations.post_office')}}</label>
<select style="{{$select_style}}"  name="postoffice" id="postoffices">
</select>
<br>

@push('scripts')
    <script>

        let wilayas = document.querySelector("#wilayas")
        let dairas = document.querySelector("#dairas")
        let communes = document.querySelector("#communes")
        let postoffices = document.querySelector("#postoffices")

        fetchWilayas()

        let selectedWilaya = -1
        wilayas.addEventListener('change',function(event){
            selectedWilaya = event.target.value
            fetchDairas()
        })
        let selectedDaira = -1
        dairas.addEventListener('change',function(event){
            selectedDaira=event.target.value
            fetchCommunes()
        })
        let selectedCommune = -1
        communes.addEventListener('change',function(event){
            selectedCommune=event.target.value
            fetchPostOffices()
        })

       function fetchWilayas(){
        clearList('wilayas')
        clearList('dairas')
        clearList('communes')
        clearList('postoffices')

        fetch('/api/algeriancities/wilayas')
        .then(res => res.json())
        .then(data => {
            data.forEach((entry) => {
                let option = document.createElement('option')
                option.text= entry.wilaya_code + ' ' + entry.wilaya_name_ascii +  ' ' + entry.wilaya_name  
                option.value = entry.wilaya_code
                wilayas.add(option)
            })
        })
       }
       function fetchDairas(){
        clearList('dairas')
        clearList('communes')
        clearList('postoffices')
        fetch('/api/algeriancities/dairas/'+selectedWilaya)
            .then(res => res.json())
            .then(data => {
                data.forEach((entry) => {
                    let option = document.createElement('option')
                    option.text=  entry.daira_name_ascii +  ' ' + entry.daira_name  
                    option.value = entry.daira_name_ascii
                    dairas.add(option)
                })
            })
       }
       function fetchCommunes(){
        clearList('communes')
        clearList('postoffices')
        fetch('/api/algeriancities/communes/'+selectedDaira)
            .then(res => res.json())
            .then(data => {
                data.forEach((entry) => {
                    let option = document.createElement('option')
                    option.text =  entry.commune_name_ascii +  ' ' + entry.commune_name  
                    option.value = entry.commune_name_ascii
                    communes.add(option)
                })
            })
       }
       function fetchPostOffices(){
        clearList('postoffices')
        fetch('/api/algeriancities/postoffices/'+selectedCommune)
            .then(res => res.json())
            .then(data => {
                data.forEach((entry) => {
                    let option = document.createElement('option')
                    option.text =  entry.post_code +  ' | ' + entry.post_name_ascii + '| ' + entry.post_address_ascii  
                    option.value = entry.post_name_ascii
                    postoffices.add(option)
                })
            })
       }
       function clearList(selectId){
        document.querySelector(`#${selectId}`).value=-1
        document.querySelectorAll(`#${selectId} option`).forEach(option => option.remove())
        let option = document.createElement('option')
        option.text= '-'  
        option.value = null
        document.querySelector(`#${selectId}`).add(option)
       }
    </script>
@endpush