<html>
<head>
    <title>  instagram profile </title>
</head>

<body>



    <h2> INstagram 5  <?php echo "hi";  ?></h2>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js" integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>


const urlString = `https://i.instagram.com/api/v1/users/leoronaldo/info`;
const value = 'Mozilla/5.0 (Linux; Android 9; GM1903 Build/PKQ1.190110.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/75.0.3770.143 Mobile Safari/537.36 Instagram 103.1.0.15.119 Android (28/9; 420dpi; 1080x2260; OnePlus; GM1903; OnePlus7; qcom; sv_SE; 164094539)';

function modifiy_headers(headerStr) {
  chrome.webRequest.onBeforeSendHeaders.addListener(
    function (details) {
      for (var header of details.requestHeaders) {
        if (header.name.toLowerCase() === 'user-agent') {
          header.value = headerStr
        }
      }
      return { requestHeaders: details.requestHeaders }
    },
    { urls: ['https://i.instagram.com/api/v1/users/*'] },
    ['blocking', 'requestHeaders']
  )
}



const headers = {
  'User-Agent': value,
//  'Access-Control-Allow-Origin': '*'
};

function get_instagram_user_id(username) {
  return new Promise((resolve, reject) => {
    //let url = `https://www.instagram.com/${username}/?__a=1`;
    let url = `https://i.instagram.com/api/v1/users/web_profile_info/?username=${username}`
  //  modifiy_headers('Mozilla/5.0 (iPhone; CPU iPhone OS 12_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 105.0.0.11.118 (iPhone11,8; iOS 12_3_1; en_US; en-US; scale=2.00; 828x1792; 165586599)')

    fetch(url,{headers})
      .then(res => res.json())
      .then(out => resolve(out.data.user.id))
  })
}
    
get_instagram_user_id('leoronaldo');

</script>


</body>

        
</html>

