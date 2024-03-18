<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>

       @vite(['resources/js/app.js','resources/css/app.css'])
     
    </head>
       
    <body>
     

        <div class="flex flex-col items-center pb-12 bg-white">
            <div
              class="flex gap-5 justify-between items-center self-stretch px-16 py-2 w-full text-base whitespace-nowrap bg-white max-md:flex-wrap max-md:px-5 max-md:max-w-full"
            >
            <svg xmlns="http://www.w3.org/2000/svg" width="154" height="33" viewBox="0 0 154 33" fill="none">
                <path d="M36.7262 12.008H38.9763V28.0366H36.7262V12.008ZM37.8499 9.77139C37.5551 9.79397 37.2634 9.65836 37.0137 9.38263C36.764 9.1069 36.5681 8.70415 36.4521 8.22807C36.3752 7.91197 36.3356 7.57187 36.3356 7.22822C36.3356 6.88456 36.3752 6.54446 36.4521 6.22836C36.5681 5.7524 36.7641 5.34976 37.0138 5.07405C37.2635 4.79835 37.5552 4.66265 37.8499 4.68504C38.0456 4.66994 38.241 4.72454 38.4243 4.84554C38.6077 4.96654 38.7751 5.15143 38.9167 5.38908C39.0582 5.62672 39.1708 5.91219 39.2477 6.22827C39.3247 6.54435 39.3643 6.8845 39.3643 7.22822C39.3643 7.57193 39.3247 7.91208 39.2477 8.22816C39.1708 8.54424 39.0582 8.82971 38.9167 9.06735C38.7751 9.305 38.6077 9.48989 38.4243 9.61089C38.241 9.73189 38.0456 9.78649 37.8499 9.77139ZM90.026 4.6804H92.276V17.9572L95.2697 12.008H97.992L94.0929 19.3553L98.4113 28.0366H95.6889L92.276 20.7531V28.0366H90.026V4.6804ZM84.6175 28.0366C82.5678 28.0366 81.2252 26.4359 80.5897 23.2349L82.6217 21.994C82.7413 22.7929 83.0015 23.5053 83.3653 24.0295C83.7243 24.4047 84.1299 24.6212 84.5472 24.6605C84.9644 24.6998 85.3809 24.5606 85.7607 24.255C85.8848 24.1578 85.9911 24.0025 86.0681 23.806C86.145 23.6095 86.1895 23.3796 86.1967 23.1416C86.1913 22.9189 86.1491 22.7038 86.0751 22.5227C86.0011 22.3415 85.8987 22.2021 85.7803 22.1215C85.3009 21.7318 84.7944 21.4547 84.2737 21.2974C82.224 20.5127 81.199 18.7944 81.199 16.1426C81.1908 15.271 81.3515 14.4202 81.6547 13.7296C81.9624 13.0002 82.3753 12.4279 82.851 12.0716C83.3554 11.6931 83.8985 11.4996 84.447 11.5028C86.083 11.5028 87.2747 12.6994 88.0219 15.093L86.4092 17.0548C85.973 15.5868 85.3209 14.8542 84.4526 14.8575C84.1583 14.8467 83.8681 14.9791 83.614 15.2402C83.5121 15.3351 83.4265 15.4761 83.3661 15.6486C83.3056 15.8211 83.2725 16.0187 83.2702 16.2212C83.2719 16.4348 83.3049 16.6441 83.3661 16.8288C83.4273 17.0136 83.5146 17.1674 83.6196 17.2756C84.027 17.6611 84.4697 17.9184 84.9277 18.0358C86.0662 18.4182 86.9048 18.9808 87.4433 19.723C87.7203 20.0857 87.9418 20.563 88.0881 21.1125C88.2344 21.6619 88.301 22.2663 88.2818 22.8719C88.2953 23.6059 88.2064 24.3347 88.0227 24.9946C87.8391 25.6546 87.5663 26.2257 87.2281 26.6584C86.4688 27.6122 85.5506 28.0969 84.6175 28.0366ZM61.8738 23.9361C62.174 24.8715 62.5776 25.6923 63.0609 26.3505C63.5442 27.0087 64.0976 27.491 64.6884 27.7692C65.2793 28.0474 65.8959 28.1158 66.5021 27.9706C67.1083 27.8253 67.6918 27.4692 68.2186 26.9232C68.8866 26.2013 69.4267 25.1669 69.7783 23.9361C70.1541 22.6463 70.3459 21.2157 70.3372 19.7672C70.3473 18.3309 70.1553 16.9124 69.7783 15.6373C69.4314 14.3907 68.8907 13.3417 68.2186 12.6113C67.495 11.8856 66.6761 11.504 65.8427 11.504C65.0094 11.504 64.1905 11.8856 63.467 12.6113C62.7929 13.3478 62.2467 14.3944 61.8877 15.6373C61.5214 16.918 61.3354 18.3343 61.3455 19.7672C61.3321 21.2105 61.5131 22.6389 61.8738 23.9361ZM64.1099 16.3044C64.3087 15.8365 64.5698 15.4612 64.8705 15.2115C65.1711 14.9618 65.5021 14.8453 65.8344 14.8722C66.164 14.8436 66.4925 14.9596 66.7902 15.2097C67.0879 15.4597 67.3453 15.836 67.5394 16.3044C67.9416 17.3222 68.157 18.5312 68.157 19.7697C68.157 21.0082 67.9416 22.2171 67.5394 23.2349C67.3453 23.7032 67.0878 24.0794 66.7901 24.3294C66.4924 24.5794 66.164 24.6953 65.8344 24.6669C65.5021 24.6937 65.1712 24.5772 64.8705 24.3275C64.5699 24.0779 64.3087 23.7027 64.1099 23.2349C63.7197 22.2089 63.5115 21.0031 63.5115 19.7697C63.5115 18.5362 63.7197 17.3304 64.1099 16.3044ZM51.599 23.7107C51.919 25.0589 52.4699 26.1994 53.1754 26.9744C53.8809 27.7493 54.7062 28.1205 55.5372 28.0366C57.4361 28.0366 58.8205 26.7007 59.6907 24.0295L57.8936 22.3764C57.3345 23.9034 56.5891 24.6669 55.6574 24.6669C55.2413 24.6854 54.8295 24.5166 54.4611 24.1766C54.1346 23.8424 53.8601 23.3724 53.6617 22.808C53.4823 22.2766 53.377 21.6784 53.3543 21.0621H59.7829V19.4386C59.7819 18.1558 59.6277 16.8877 59.3303 15.7159C59.0074 14.4277 58.4718 13.3389 57.7926 12.5905C57.1134 11.842 56.3219 11.4683 55.5204 11.5175C54.6376 11.4629 53.7673 11.897 53.0329 12.7584C52.392 13.5386 51.8893 14.6196 51.5822 15.8778C51.2801 17.1179 51.1251 18.453 51.1266 19.8016C51.1352 21.1465 51.2958 22.4754 51.599 23.7107ZM54.0838 15.7307C54.2767 15.4057 54.5046 15.1516 54.7542 14.9831C55.0037 14.8147 55.2699 14.7353 55.5372 14.7496C55.7993 14.7248 56.0616 14.7937 56.3081 14.9522C56.5546 15.1107 56.7802 15.3555 56.9711 15.6717C57.3335 16.3292 57.5792 17.1574 57.6783 18.0555H53.3767C53.4657 17.1684 53.7134 16.3542 54.0838 15.7307ZM41.8552 25.8147C42.5819 27.296 43.6162 28.0366 44.9577 28.0366C45.4403 28.0533 45.9168 27.8452 46.3386 27.4333C46.6817 27.1436 46.9721 26.6918 47.177 26.1286V27.7863H49.4271V4.68531H47.1716V13.2194C46.9222 12.6926 46.6051 12.2774 46.2463 12.008C45.8431 11.6773 45.4028 11.5096 44.9577 11.5175C43.6162 11.5175 42.5819 12.2695 41.8552 13.7735C41.1286 15.2776 40.7717 17.2805 40.7846 19.7819C40.7846 22.2997 41.1415 24.3104 41.8552 25.8147ZM43.7419 16.177C43.92 15.7644 44.151 15.4313 44.4161 15.2046C44.6813 14.9779 44.9731 14.8641 45.268 14.8722C45.5603 14.8628 45.8496 14.9764 46.1117 15.2034C46.3738 15.4304 46.6011 15.7642 46.7746 16.177C47.1714 17.0253 47.3727 18.2223 47.3727 19.7672C47.4156 21.0615 47.2046 22.3425 46.7746 23.3968C46.5982 23.8017 46.3698 24.1277 46.108 24.3484C45.8462 24.5691 45.5584 24.6782 45.268 24.6669C44.9731 24.675 44.6813 24.5611 44.4161 24.3344C44.151 24.1077 43.92 23.7746 43.7419 23.3621C43.3132 22.3199 43.102 21.0505 43.1438 19.7672C43.1438 18.2223 43.3423 17.0253 43.7419 16.177ZM25.8812 12.008H28.1481L30.4707 22.4698L32.7934 12.008H35.0603L31.231 28.0366H29.7077L25.8812 12.008ZM74.5243 15.2205C74.8044 14.8672 75.141 14.6783 75.4859 14.6809C75.8972 14.6544 76.301 14.8779 76.6291 15.3136C76.7841 15.5487 76.9058 15.844 76.9844 16.1761C77.063 16.5082 77.0964 16.8678 77.082 17.2265V17.9231H75.5586C74.8616 17.9024 74.1695 18.1293 73.5238 18.5899C72.9731 18.9601 72.4948 19.6004 72.1457 20.4343C71.8185 21.2262 71.6469 22.1832 71.6566 23.1612C71.6335 23.8233 71.6911 24.4864 71.8256 25.1063C71.9601 25.7263 72.1683 26.2888 72.4364 26.7564C72.9817 27.6207 73.6979 28.0766 74.4321 28.0267C74.9701 28.0555 75.5044 27.8634 75.9926 27.4657C76.4809 27.0681 76.9094 26.4757 77.244 25.736L77.4816 27.7715H79.2229V18.2124C79.2229 15.7926 78.8959 14.0743 78.2418 13.0576C77.5878 12.0405 76.6691 11.5208 75.4859 11.4979C74.6905 11.4751 73.9127 11.911 73.2721 12.7387C72.6519 13.524 72.2032 14.6575 72.0004 15.9515L73.9066 16.9077C73.9951 16.2369 74.2134 15.6407 74.5243 15.2205ZM77.0623 21.2338C77.0686 21.9181 76.9479 22.5877 76.7186 23.1418C76.4958 23.6808 76.1959 24.1071 75.8492 24.3775C75.5011 24.6753 75.1185 24.8281 74.7312 24.8238C74.592 24.8402 74.4524 24.805 74.3214 24.7205C74.1904 24.6361 74.071 24.5042 73.971 24.3336C73.7934 24.0207 73.693 23.5979 73.6915 23.1563C73.6773 22.8334 73.7099 22.5095 73.7861 22.2145C73.8623 21.9196 73.9797 21.6632 74.1275 21.4691C74.5068 21.0492 74.9516 20.8485 75.3993 20.8954H77.0483L77.0623 21.2338ZM14.0942 10.6836C15.5624 10.6836 16.7524 8.59766 16.7524 6.02419C16.7524 3.45071 15.5624 1.36475 14.0942 1.36475C12.6263 1.36475 11.4361 3.45098 11.4361 6.02419C11.4361 8.59766 12.6261 10.6836 14.0942 10.6836ZM6.07504 10.6836C7.54318 10.6836 8.73318 8.59766 8.73318 6.02419C8.73318 3.45071 7.54318 1.36475 6.07504 1.36475C4.60707 1.36475 3.41691 3.45098 3.41691 6.02419C3.41691 8.59766 4.60691 10.6836 6.07504 10.6836ZM1.78747 16.2064C1.64128 16.1967 1.49573 16.245 1.36165 16.3477C1.22756 16.4503 1.1084 16.6047 1.01302 16.7993C0.917645 16.994 0.848512 17.2239 0.810769 17.4719C0.773025 17.7199 0.767643 17.9796 0.795022 18.2318C1.13726 21.0144 1.87974 23.597 2.95175 25.7336C4.02377 27.8703 5.38963 29.4898 6.91928 30.438C8.44893 31.3862 10.0914 31.6315 11.6904 31.1505C13.2894 30.6696 14.7916 29.4784 16.0539 27.6904C17.7442 25.2961 18.916 21.9581 19.3743 18.2321C19.401 17.98 19.3953 17.7206 19.3573 17.4729C19.3194 17.2253 19.2503 16.9958 19.1551 16.8012C19.0599 16.6067 18.9409 16.4523 18.8071 16.3493C18.6733 16.2463 18.528 16.1974 18.382 16.2062L1.78747 16.2064Z" fill="#00AC4F"/>
                <path d="M105.436 19.6047C105.27 19.4567 105.13 19.2332 105.031 18.9576V19.7764H103.913V8.66749H105.031V12.591C105.154 12.3343 105.31 12.1312 105.486 11.9976C105.685 11.8328 105.901 11.7474 106.121 11.7476C106.406 11.7168 106.692 11.8002 106.956 11.9914C107.22 12.1825 107.457 12.4765 107.647 12.8512C107.993 13.7245 108.178 14.7624 108.178 15.8259C108.178 16.8893 107.993 17.9273 107.647 18.8006C107.457 19.1752 107.22 19.4692 106.956 19.6603C106.692 19.8515 106.406 19.9349 106.121 19.9042C105.882 19.9103 105.646 19.8069 105.436 19.6047ZM106.722 17.5938C106.913 17.0619 107.015 16.4454 107.015 15.8159C107.015 15.1865 106.913 14.5699 106.722 14.038C106.633 13.8372 106.519 13.6754 106.388 13.5656C106.258 13.4558 106.115 13.4009 105.97 13.4053C105.826 13.4001 105.683 13.4547 105.553 13.5647C105.424 13.6746 105.311 13.8368 105.223 14.038C105.033 14.5728 104.933 15.1905 104.933 15.8208C104.933 16.4512 105.033 17.0688 105.223 17.6037C105.311 17.8048 105.424 17.967 105.553 18.077C105.683 18.1869 105.826 18.2415 105.97 18.2364C106.115 18.24 106.259 18.1837 106.389 18.0721C106.52 17.9605 106.634 17.7967 106.722 17.5938ZM110.146 19.2715L108.508 11.8652H109.626L110.674 16.8238L111.658 11.8652H112.776L110.45 22.9745H109.38L110.146 19.2715ZM134.164 11.7869H133.549V13.4055H134.164V19.8452H135.192V13.4252H136.19V11.7869H135.192V10.5264C135.192 9.72194 135.38 9.44242 135.808 9.44242C135.979 9.45826 136.148 9.52295 136.308 9.6335L136.537 8.11802C136.28 7.9313 136.004 7.8411 135.726 7.85325C134.743 7.85325 134.164 8.88804 134.164 10.6784V11.7869ZM118.883 8.57905H114.048V10.3154H115.943V19.8452H117.019V10.3154H118.883V8.57905ZM126.089 11.6837C125.829 11.6788 125.574 11.804 125.353 12.0447C125.132 12.2853 124.955 12.6315 124.842 13.0425V11.7869H123.817V23.0138H124.842V19.0012C124.982 19.3048 125.158 19.5487 125.359 19.7145C125.56 19.8802 125.78 19.9634 126.002 19.9577C127.369 19.9577 128.093 18.1824 128.093 15.7838C128.093 13.3853 127.386 11.6834 126.1 11.6834L126.089 11.6837ZM131.151 18.3884C130.9 18.4116 130.653 18.2794 130.452 18.015C130.251 17.7505 130.11 17.3706 130.052 16.9417C131.411 16.8386 132.744 16.2599 132.744 14.1556C132.744 12.9442 132.062 11.7034 131.087 11.7034C129.77 11.7034 128.881 13.5819 128.881 15.8136C128.881 18.1482 129.756 19.9776 131.064 19.9776C131.438 20.0022 131.81 19.8721 132.15 19.5977C132.49 19.3233 132.788 18.9124 133.021 18.3983L132.523 17.2163C131.995 18.163 131.668 18.3884 131.162 18.3884H131.151ZM138.949 11.6837C138.643 11.673 138.339 11.7729 138.055 11.9771C137.772 12.1814 137.515 12.4856 137.302 12.871C137.088 13.2565 136.922 13.7148 136.813 14.2176C136.705 14.7204 136.657 15.2569 136.671 15.7939C136.671 18.1777 137.605 19.953 138.949 19.953C140.294 19.953 141.25 18.1286 141.25 15.7939C141.265 14.9852 141.14 14.1873 140.891 13.5068C140.641 12.8263 140.279 12.2956 139.853 11.9859C139.57 11.7803 139.267 11.6775 138.96 11.6837H138.949ZM142.658 11.8065H142.169V19.8649H143.2V16.775C143.2 14.8129 143.693 13.4986 144.422 13.4986C144.599 13.4822 144.776 13.5289 144.942 13.6359L145.101 11.7328C144.982 11.7052 144.861 11.6888 144.741 11.6837C144.017 11.6837 143.497 12.5517 143.192 13.6752V11.7869L142.658 11.8065ZM150.887 13.2778C151.466 13.2778 151.58 13.9744 151.58 15.598V19.8747H152.609V14.4794C152.609 12.5176 151.849 11.6886 151.147 11.6886C150.524 11.6886 149.953 12.3705 149.635 13.6507C149.56 13.0863 149.377 12.5841 149.116 12.2272C148.856 11.8704 148.534 11.6803 148.204 11.6886C147.878 11.7132 147.563 11.904 147.298 12.2377C147.033 12.5713 146.829 13.0333 146.711 13.5671V11.7869H145.685V19.8452H146.711V16.4119C146.711 14.6759 147.234 13.2729 147.941 13.2729C148.522 13.2729 148.629 13.9695 148.629 15.593V19.8698H149.657V16.4119C149.66 14.6855 150.188 13.2827 150.898 13.2827L150.887 13.2778ZM119.462 11.8065H118.274L120.23 19.7276C119.856 21.1988 119.652 21.557 119.392 21.557C119.107 21.4809 118.849 21.2202 118.668 20.8262L118.148 22.0376C118.32 22.3589 118.527 22.6157 118.757 22.7927C118.987 22.9697 119.236 23.0632 119.487 23.0675C120.107 23.0675 120.585 22.4397 120.859 21.302L123.154 11.7866H121.988L120.803 17.4615L119.462 11.8065ZM125.89 18.3884C125.13 18.3884 124.811 17.3048 124.811 15.8035C124.811 14.3028 125.139 13.2827 125.89 13.2827C126.642 13.2827 127.009 14.3568 127.009 15.8038C127.009 17.2505 126.648 18.3887 125.896 18.3887L125.89 18.3884ZM131.101 13.2827C131.57 13.2827 131.766 13.7732 131.766 14.1802C131.766 15.1858 131.179 15.6272 129.957 15.691C129.963 14.4452 130.368 13.2827 131.106 13.2827H131.101ZM138.955 18.3884C138.153 18.3884 137.742 17.2311 137.742 15.8035C137.742 14.3765 138.144 13.2827 138.955 13.2827C139.765 13.2827 140.171 14.4305 140.171 15.8038C140.171 17.2557 139.757 18.3887 138.96 18.3887L138.955 18.3884Z" fill="#969696"/>
                </svg>
              <div
                class="flex gap-5 justify-between self-stretch my-auto text-neutral-900 max-md:flex-wrap max-md:max-w-full"
              >
                <div class="grow">Product</div>
                <div class="text-center">Solutions</div>
                <div>Pricing</div>
                <div class="text-center">Examples</div>
                <div class="grow my-auto text-center">Resources</div>
              </div>
              <div class="flex gap-2.5 self-stretch text-center">
                <div
                  class="grow justify-center px-8 py-3.5 bg-neutral-200 rounded-[48px] text-neutral-900 max-md:pl-5"
                >
                  Log in
                </div>
                <div
                  class="grow justify-center px-8 py-3.5 text-white bg-neutral-900 rounded-[48px] max-md:pl-5"
                >
                  Sign up
                </div>
              </div>
            </div>
            <div class="mt-14 w-full max-w-[1242px] max-md:mt-10 max-md:max-w-full">
              <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                  <div class="flex flex-col px-5 mt-7 max-md:mt-10 max-md:max-w-full">
                    <div
                      class="text-6xl font-extrabold tracking-tighter text-center text-gray-900 bg-clip-text leading-[60px] max-md:max-w-full max-md:text-4xl max-md:leading-10"
                    >
                   Start a <span class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline">Face to Face</span>
                      interactive video
                    </div>
                    <div
                      class="flex flex-col mt-11 ml-3.5 max-w-full w-[409px] max-md:mt-10 max-md:ml-2.5"
                    >
                      <div
                        class="ml-3.5 text-md leading-8 text-neutral-900 text-opacity-60 max-md:ml-2.5"
                      >
                        VideoJob helps you streamline your conversations and build
                        business relationships at scale.
                      </div>
                      <div class="mb-4 space-x-0 md:space-x-2 md:mb-8">
                        <a href="#_" class="inline-flex items-center justify-center w-full px-6 py-3 mb-2 text-lg text-white bg-green-400 rounded-2xl sm:w-auto sm:mb-0">
                            Get Started
                            <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                        <a href="#_" class="inline-flex items-center justify-center w-full px-6 py-3 mb-2 text-lg bg-gray-100 rounded-2xl sm:w-auto sm:mb-0">
                            Learn More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                        </a>
                    </div>
                      <div
                        class="text-base leading-6 text-neutral-900 max-md:mt-10"
                      >
                        ✌️ No credit card required.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                  <video autoplay="" loop="" muted="" playsinline="" class="video-player__Video-sc-10xsxxf-0 cCGQwY" vnid="VNvideo1W" crossorigin="anonymous" vnframeid="0"><source src="https://videos.ctfassets.net/7907dlxc16yt/5DgixgwMT6CFWQjl44xtHR/5ce9a2a47985f6d03b33c691523e4d92/-VideoAsk_____WebRevamp_____03-_x2_optimized.mp4" type="video/mp4"></video>
                </div>
              </div>
            </div>
            <div
              class="mt-12 text-3xl leading-10 text-center text-neutral-900 w-[574px] max-md:mt-10 max-md:max-w-full"
            >
              Scale your high touch communication with asynchronous, interactive video
            </div>
           
            <div class="mt-5 w-full max-w-[1243px] max-md:max-w-full">
                <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                 
                  <div class="flex flex-col ml-5 w-[33%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col self-stretch px-5 my-auto max-md:mt-10">
                      <div
                        class="text-5xl leading-[56px] text-neutral-900 max-md:text-4xl max-md:leading-[52px]"
                      >
                        Gather better data with video forms
                      </div>
                      <div class="mt-7 text-2xl leading-8 text-neutral-900 text-opacity-60">
                        Collecting data has never been easier. Video forms let you collect
                        valuable contact details and feedback in an engaging, interactive,
                        and personal way.
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-col w-[67%] max-md:ml-0 max-md:w-full">
                    <video autoplay="" loop="" muted="" playsinline="" class="video-player__Video-sc-10xsxxf-0 cCGQwY" vnid="VNvideo7W" crossorigin="anonymous" vnframeid="0"><source src="https://videos.ctfassets.net/7907dlxc16yt/23hzMZboFcBTb82x26gW48/0b0ca30db20b06999a1625bacecee59d/-VideoAsk_____Web_Revamp_____03-_x2_optimized__online-video-cutter.com_.mp4" type="video/mp4"></video>                </div>
                </div>
              </div>
            <div class="self-stretch w-full max-md:max-w-full">
              <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                <div class="flex flex-col w-[64%] max-md:ml-0 max-md:w-full">
                    <img data-testid="content-image"
                    src="https://images.ctfassets.net/7907dlxc16yt/3jruKTtDYcBCxrZvdV1XG/500d61a6cea7a4aafda8eeb26b78a85f/4_3__13___1_.jpg" 
                    class="content-section__SectionImage-sc-zr8ljk-4 cLOuKs">
                </div>
                <div class="flex flex-col ml-5 w-[36%] max-md:ml-0 max-md:w-full">
                  <div
                    class="flex flex-col px-5 text-xl leading-5 text-neutral-900 max-md:mt-5 max-md:max-w-full"
                  >
                    <div
                      class="justify-center self-start px-9 py-7 ml-8 text-center bg-neutral-200 rounded-[48px] max-md:px-5 max-md:ml-2.5"
                    >
                      See how
                    </div>
                    <div
                      class="mt-10 text-5xl leading-[56px] max-md:mt-10 max-md:max-w-full max-md:text-4xl max-md:leading-[52px]"
                    >
                      Automate the screening process
                    </div>
                    <div
                      class="mt-4 text-2xl leading-8 text-neutral-900 text-opacity-50 max-md:max-w-full"
                    >
                      Streamline your workload with pre-recorded video interviews,
                      automate interview scheduling, and evaluate candidates without
                      losing the personal touch.
                    </div>
                    <div
                      class="justify-center self-center px-9 py-7 mt-32 text-center text-black bg-neutral-200 rounded-[48px] max-md:px-5 max-md:mt-10"
                    >
                      Discover how
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full max-w-[1200px] max-md:max-w-full">
              <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                <div class="flex flex-col w-[34%] max-md:ml-0 max-md:w-full">
                  <div
                    class="flex flex-col items-start px-5 mt-7 text-neutral-900 max-md:mt-10"
                  >
                    <div
                      class="ml-3.5 text-5xl leading-[56px] w-[263px] max-md:ml-2.5 max-md:text-4xl max-md:leading-[52px]"
                    >
                      Features for recruitment
                    </div>
                    <div
                      class="flex flex-col self-stretch py-8 pr-12 pl-3.5 mt-14 w-full leading-5 bg-zinc-100 rounded-[32px] max-md:pr-5 max-md:mt-10"
                    >
                      <div class="flex gap-3.5 text-xl">
                        <img
                          loading="lazy"
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/fd5f1cb48f03bcfd871fd16cd1d45930a13175ea5e6bd19fdebf76c20c4485d0?"
                          class="shrink-0 my-auto w-3.5 aspect-[7.14]"
                        />
                        <div class="flex-auto">Integrate with your ATS and calendar</div>
                      </div>
                      <div class="mt-6 text-base">
                        Integrate with your ATS (e.g. Greenhouse) and calendar, to manage
                        all your applicants in one place and let highly qualified
                        candidates directly book an interview.
                      </div>
                    </div>
                    <div
                      class="flex flex-col mt-6 max-w-full text-xl leading-5 text-neutral-500 w-[184px]"
                    >
                      <div class="flex gap-2.5">
                        <img
                          loading="lazy"
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/b9da8a8f2ce3ae4fe0e7def5272bf61695b6c0bb8fe547b1d1eba3fef54bda46?"
                          class="shrink-0 self-start mt-1 w-3.5 aspect-square fill-neutral-500"
                        />
                        <div class="flex-auto">File Upload</div>
                      </div>
                      <div class="flex gap-2.5 mt-5 whitespace-nowrap">
                        <img
                          loading="lazy"
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/b9da8a8f2ce3ae4fe0e7def5272bf61695b6c0bb8fe547b1d1eba3fef54bda46?"
                          class="shrink-0 self-start mt-1 w-3.5 aspect-square fill-neutral-500"
                        />
                        <div class="grow">Drop-off analysis</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex flex-col ml-5 w-[66%] max-md:ml-0 max-md:w-full">
                    <img src="https://images.ctfassets.net/7907dlxc16yt/7tP2P154HoLal8kFUPFNnP/ca1097c5763ac46558257332bfd35ab8/Img_Recruitment-SMB_Feature-4.jpg" class="content-section-accordion__SectionImage-sc-1ddhksn-4 kAntNF">
                </div>
              </div>
            </div>
           
          </div>
          <div class="flex flex-col justify-center bg-slate-50">
            <div
              class="flex flex-col items-start px-16 pt-20 pb-8 w-full bg-zinc-100 max-md:px-5 max-md:max-w-full"
            >
              <div
                class="self-center mt-2 w-full max-w-[1184px] max-md:pr-5 max-md:max-w-full"
              >
                <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                  <div class="flex flex-col w-[34%] max-md:ml-0 max-md:w-full">
                    <div
                      class="flex flex-col text-base leading-8 text-neutral-400 max-md:mt-10"
                    >
                      <img
                        loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/836aeaa833b3dd690c3936057f0a37cbd5b04fd50b3f55358ed5a88754e68b4d?"
                        class="self-center aspect-[6.67] w-[294px]"
                      />
                      <div class="mt-7">
                        Find your next career opportunity and connect with like-minded
                        individuals.
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-col ml-5 w-[22%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col grow max-md:mt-10">
                      <div class="text-2xl font-semibold leading-9 text-zinc-500">
                        Help Links
                      </div>
                      <div class="mt-7 text-lg leading-10 text-gray-400">
                        <span class="text-gray-400">About Us</span><br /><span
                          class="text-gray-400"
                          >Services</span
                        ><br /><span class="text-gray-400">Privacy Policy </span
                        ><br /><span class="text-gray-400">Terms & Condition</span>
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-col ml-5 w-[44%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col text-base max-md:mt-10">
                      <div class="text-2xl font-semibold leading-9 text-gray-500">
                        Subscribe Our Newsletter
                      </div>
                      <div class="mt-2 leading-6 text-gray-400">
                        Get the freshest job news and articles delivered to your inbox
                        every week.
                      </div>
                      <div
                        class="flex gap-5 items-start pt-4 pl-8 mt-6 bg-white max-md:pl-5"
                      >
                      <div class="flex-auto leading-8 text-gray-400" >
                        <input type="text" placeholder="Email Address" class="border-none">
                      </div>
                      
                        <div
                          class="justify-center items-start px-10 py-4  font-medium text-white whitespace-nowrap bg-green-600 leading-[150%] max-md:px-5"
                        >
                          Submit
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="self-start mt-20 text-lg leading-8 text-gray-500 max-md:mt-10"
              >
                © 2023 All Right Reserved Creativemouse.co
              </div>
            </div>
          </div>
    </body>
</html>
