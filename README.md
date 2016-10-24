# Zenplay Sdk Source Code
### Sample config:
```javascript
{
  "name": "tienrocker/sample-zen-sdk",
  "description": "\\",
  "authors": [
    {
      "name": "tien tran",
      "email": "tienrocker@gmail.com"
    }
  ],
  "require": {
    "paragraph1/php-fcm": "^0.7.0",
    "tienrocker/zensdk": "dev-master"
  },
  "repositories": [
    {
      "type": "package",
      "package": {
        "name": "tienrocker/zensdk",
        "version": "dev-master",
        "source": {
          "url": "git@github.com:tienrocker/zensdk.git",
          "type": "git",
          "reference": "master"
        },
        "autoload": {
          "psr-0": {
            "tienrocker\\ZenSdk": "src"
          }
        }
      }
    }
  ]
}
```
