# Automad Bootstrap Icons Extension

This package let's you easily embed [Bootstrap Icons](https://icons.getbootstrap.com) within your Automad templates.

![](https://user-images.githubusercontent.com/98681/77025215-bea36900-694d-11ea-9f2d-68485c4a2543.png)

## Usage

You can embed an icon as follows:

	<@ Automad/Bootstrap/Icon { icon: 'alert-circle' } @>

The dimensions and size can be changed as follows:

	<@ Automad/Bootstrap/Icon {
	    icon: 'alert-circle',
	    w: '1.5em',
	    h: '1.5em'
	} @>

## Options

An icon can have the following settings:

| Parameter | Default |
|--------|----------------|
| `icon` | "alert-circle" |
| `w` |  "1em" |
| `h` | "1em" |
| `viewBox` | "0 0 16 16" |
