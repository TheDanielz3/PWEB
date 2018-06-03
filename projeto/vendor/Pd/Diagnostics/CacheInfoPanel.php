<?php

namespace Pd\Diagnostics;

use Tracy;


/**
 * Provides info about current Cache
 */
class CacheInfoPanel implements Tracy\IBarPanel
{
	/** @var string[] $cacheBenchmarks [{key => val}] */
	private $cacheBenchmarks;

    private $tabName = 'WL Cache';

	/** @var IDatabaseInfoPanelStyleHandler */
	private $styleCallback;

	/**
	 * @param string[] $cacheBenchmarks All database parameters in [{key => val}] format
	 * @
	 * @param IDatabaseInfoPanelStyleHandler Handler with formating of DB name label in panel
	 */
	public function __construct($cacheBenchmarks, IDatabaseInfoPanelStyleHandler $styleCallback = NULL)
	{
        $this->cacheBenchmarks = $cacheBenchmarks;

		$this->styleCallback = $styleCallback;
	}


	public function getTab()
	{
		if ($this->styleCallback) $style = ' style="' . $this->styleCallback->getStyle($this->tabName, $this->cacheBenchmarks) . '"';
		else $style = '';

		return '<span title="Extreme Cache info">'
			. '<img width=16 height=16 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAEYSURBVBgZBcHPio5hGAfg6/2+R980k6wmJgsJ5U/ZOAqbSc2GnXOwUg7BESgLUeIQ1GSjLFnMwsKGGg1qxJRmPM97/1zXFAAAAEADdlfZzr26miup2svnelq7d2aYgt3rebl585wN6+K3I1/9fJe7O/uIePP2SypJkiRJ0vMhr55FLCA3zgIAOK9uQ4MS361ZOSX+OrTvkgINSjS/HIvhjxNNFGgQsbSmabohKDNoUGLohsls6BaiQIMSs2FYmnXdUsygQYmumy3Nhi6igwalDEOJEjPKP7CA2aFNK8Bkyy3fdNCg7r9/fW3jgpVJbDmy5+PB2IYp4MXFelQ7izPrhkPHB+P5/PjhD5gCgCenx+VR/dODEwD+A3T7nqbxwf1HAAAAAElFTkSuQmCC" />'
			. "<span title=\"cache\"$style>{$this->tabName}</span>"
			. '</span>';
	}


	public function getPanel()
	{
		ob_start();
		include __DIR__ . '/CacheInfoPanel.phtml';
		return ob_get_clean();
	}
}
