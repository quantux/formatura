<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * The name of this class is dependent on the component being installed.
 * The class name should have the component's name, directly followed by
 * the text InstallerScript (ex:. com_helloWorldInstallerScript).
 *
 * This class will be called by Joomla!'s installer, if specified in your component's
 * manifest file, and is used for custom automation actions in its installation process.
 *
 * In order to use this automation script, you should reference it in your component's
 * manifest file as follows:
 * <scriptfile>installer.script.php</scriptfile>
 *
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
class com_googleMapsInstallerScript {
    /**
     * This method is called after a component is installed.
     *
     * @param  \stdClass $parent - Parent object calling this method.
     *
     * @return void
     */
    public function install($parent) {
        $parent->getParent()->setRedirectURL('index.php?option=com_googlemaps');
    }
}