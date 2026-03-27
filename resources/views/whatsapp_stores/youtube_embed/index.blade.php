<style>

.youtube-link-input-group {
    display: flex;
    gap: 10px;
    margin-bottom: 15px;
}

.youtube-link-input-group input {
    flex: 1;
}

.youtube-link-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 6px;
    padding: 10px 12px;
    margin-bottom: 8px;
    transition: background 0.2s ease;
}

.youtube-link-item:hover {
    background: #e9ecef;
}

.youtube-link-item span {
    word-break: break-all;
    font-size: 14px;
}

.youtube-link-item .remove-link {
    cursor: pointer;
    color: #dc3545;
    font-weight: bold;
    font-size: 18px;
}
</style>

<div class="col-lg-6 mb-4">
  
        <label for="youtube-link-input" style="margin-bottom: 10px;">YouTube Links</label>

        <div class="youtube-link-input-group" id="youtube-link-input-group">
            <input type="text" id="youtube-link-input" class="form-control" placeholder="Enter YouTube Video Link">
            <button type="button" id="addyoutubelink" class="btn btn-success">
                <!--<i class="fas fa-plus"></i>-->Add
            </button>
        </div>

        <div id="youtube-links-list"></div>

        <input type="hidden" name="youtube_links" id="youtube_links_hidden" value='@json(\App\Helpers\VideoHelper::getVideoLinks($whatsappStore->id))'>

        <button class="btn btn-primary mt-2" onclick="saveYoutubeEmbededLinks({{ $whatsappStore->id }})">
            Save
        </button>
    
</div>






<script>
$(document).ready(function(){

        // 🔢 Set video limit based on store id
    let storeId = {{ $whatsappStore->id }};
    let videoLimit = (storeId == 424 || storeId == 208 || storeId == 1488) ? 15 : 5;


    // 🔄 Render existing links on page load
    renderLinksFromHidden();

    // ➕ Add new link
    $('#addyoutubelink').on('click', function(){
        let link = $('#youtube-link-input').val().trim();
        if(link){
            let links = getLinks();
            console.log('Current YouTube links:', links);
            
            if(links && links.length >= videoLimit){
                displayErrorMessage(`Maximum ${videoLimit} videos allowed`);
                return;
            }

            if(!links.includes(link)){
                links.push(link);
                updateLinks(links);
                  console.log('Current YouTube Updated links:', links);
                   console.log('Current YouTube*-*-**-*- Updated links:', $('#youtube_links_hidden').val());
                  
                $('#youtube-link-input').val('');
            } else {
                displayErrorMessage("This link already exists");
            }
        }
    });

    // ❌ Remove link
    $('#youtube-links-list').on('click', '.remove-link', function(){
        let linkToRemove = $(this).siblings('span').text().trim();
        let links = getLinks();

        links = links.filter(l => l !== linkToRemove);
        updateLinks(links);
    });

    // 🔄 Function: Get current links from hidden input
    function getLinks(){
        try {
            return JSON.parse($('#youtube_links_hidden').val()) || [];
        } catch(e){
            return [];
        }
    }

    // 🔄 Function: Update hidden input and render links
    function updateLinks(links){
        $('#youtube_links_hidden').val(JSON.stringify(links));
        renderLinksFromHidden();
    }

    // 🔄 Function: Render links list
    function renderLinksFromHidden(){
        let links = getLinks();
        let html = '';
        links.forEach(function(link){
            html += `
                <div class="youtube-link-item">
                    <span>${link}</span>
                    <span class="remove-link">&times;</span>
                </div>
            `;
        });
        $('#youtube-links-list').html(html);
    }
    
        function toggleInputGroup(){
        let links = getLinks();
        if(links.length >= 5){
            $('#youtube-link-input').hide();
            $('#addyoutubelink').hide();
        } else {
            $('#youtube-link-input').show();
            $('#addyoutubelink').show();
        }
    }

});
</script>
