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

then install node dependencies with

```
$ cd tool && yarn
```

or

```
$ cd tool && npm install
```

## PHP Api

```PHP
GatherPDF\Tool::print('http://www.google.com', 'google.pdf')
```

this function returns an object of schema;

```
(object) [
    'success' => (boolean)
    'error' => (string) | (none)
]
```

## TODO

Tool:getPDFDataURI() or similar
compression: `ghostscript -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/printer -dNOPAUSE -dQUIET -dBATCH -sOutputFile=output.pdf input.pdf`
