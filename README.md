# get-papers-from-orcid

A tiny PHP code snippet that fetches publications from the orcid database. I coded it for myself and I remember that the API docmentation provided by orcid was incorrect. So here is a working version!

I use the GuzzleHttp library for the http request and phpdotenv library for managing envs (to keep ids/tokens/secrets secret). However, the latter is not necessary if you want to hardcode the credentials into your php file.

It is essential to ues the right URL for `RECORD_URL`, mine has the format `https://pub.orcid.org/v3.0/0000-0001-6446-6641/record`. You can just replace the 16-digit id.

Both libraries are embedded with composer. Navigate to the folder via SSH and run `composer install`.
