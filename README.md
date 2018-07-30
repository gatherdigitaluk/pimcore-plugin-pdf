Gather Digital PDF Generator
====================

## Prerequisites

* node >= v7.6.0
* npm / yarn

## Installation

install the shared libraries;

```
$ apt-get update && apt-get install -y wget --no-install-recommends \
    && wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | apt-key add - \
    && sh -c 'echo "deb [arch=amd64] http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google.list' \
    && apt-get update \
    && apt-get install -y google-chrome-unstable \
      --no-install-recommends \
    && rm -rf /var/lib/apt/lists/* \
    && apt-get purge --auto-remove -y curl \
    && rm -rf /src/*.deb
```

(libgconf may also be required)

Other things to consider;

* installing node binaries directly from nodejs.org
* adding www-data user to audio/video groups
* chowning the hell out of the web directory

then install node dependencies with

```
$ cd tool && yarn
```

or

```
$ cd tool && npm install
```

## PHP Api

### Printing to a file

```PHP
PDFBundle\Tool::printToFile('http://www.google.com', 'google.pdf');
```

return schema;

```
(object) [
    'success' => (boolean)
    'error' => (string) | (none)
]
```

### Printing as data

(requires `/tmp` to be writable)

```PHP
PDFBundle\Tool::printToData('http://www.google.com');
```

return schema;

```
(object) [
    'success' => (boolean)
    'data' => (string) | (none)
    'error' => (string) | (none)
]
```

### Printing as dataURI

(requires `/tmp` to be writable)

```PHP
PDFBundle\Tool::printToDataURI('http://www.google.com');
```

return schema;

```
(object) [
    'success' => (boolean)
    'dataURI' => (string) | (none)
    'error' => (string) | (none)
]
```

### Printing and providing as a download

(requires `/tmp` to be writable)

```PHP
PDFBundle\Tool::printAsDownload('http://www.google.com', 'download.pdf');
```

If successful, this function sets the required headers and then calls `exit;`. Otherwise you will receive an object with the same format as printing to a file.

## Security

Since the printer needs a public URL to print, a secret key can be used to ensure that this URL is only ever seen by the application backend and not the user.

## TODO

Tool:getPDFDataURI() or similar
compression: `ghostscript -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/printer -dNOPAUSE -dQUIET -dBATCH -sOutputFile=output.pdf input.pdf`
