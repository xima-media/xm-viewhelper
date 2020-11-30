# TYPO3 Extension *xm-viewhelper*
![ddev logo](Resources/Public/xm-viewhelper-100.png)

Collection of ViewHelper for the TYPO3 CMS created by XIMA MEDIA GmbH.

## Installation

The installation is performed by [Composer](https://getcomposer.org/) and is provided by [Packagist.org](https://packagist.org/packages/xima-media/xm-viewhelper).

   ```json
   {
     "repositories": [
       {
         "type": "composer",
         "url": "https://packagist.org/"
       }
     ]
   }
   ```
   
   ```bash
   composer require xima-media/xm-viewhelper
   ```

## Namespace

The extension namespace needs to be added to a template before the available ViewHelper can be used. You can ommit the attribut _data-namespace-typo3-fluid_ if you need the html tag to be rendered.

```html
<html xmlns:xmvh="http://typo3.org/ns/Xima/XmViewhelper/ViewHelpers"
      data-namespace-typo3-fluid="true">
```

## Configuration

The following TypoScript setup can be used to configure the corresponding ViewHelpers.

```typo3_typoscript
plugin.tx_xmviewhelper {
    settings {
        contentByContext {
            partial2 = EXT:xm_viewhelper/Resources/Private/Partials/ContentByContext/Partial2.html
            contexts {
            }
        }
    }
}
```

## Documentation

The repository [Wiki](https://github.com/xima-media/xm-viewhelper/wiki) contains a list of available ViewHelpers and detailed descriptions of their purpose and use.


