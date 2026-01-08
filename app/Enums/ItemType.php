<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class ItemType extends Enum implements LocalizedEnum
{
    const INPUT = 'input';
    const TEXTAREA = 'textarea';
    const NUMERIC = 'numeric';
    const DATE = 'date';
    const RADIO = 'radio';
    const SELECT = 'select';
    const CHECKBOX = 'checkbox';
    const MULTISELECT = 'dropdown_multi';
    const TAG = 'tag';
    const IMAGE = 'image';
    const GALLERY = 'gallery';
    const VIDEOFILE = 'video';
    const PDF = 'pdf';
    const THREEDIMENSION = '3d';
    const PANORAMA = 'panorama';
    const VIDEOURL = 'videolink';

    public static array $translations = [
        ItemType::INPUT => '自由入力（一行）',
        ItemType::TEXTAREA => '自由入力（複数行）',
        ItemType::NUMERIC => '数値入力',
        ItemType::DATE => '日付',
        ItemType::RADIO => '単一選択（Radio）',
        ItemType::SELECT => '単一選択（List）',
        ItemType::CHECKBOX => '複数選択（Check）',
        ItemType::MULTISELECT => '複数選択（List）',
        ItemType::TAG => '複数選択（タグ）',
        ItemType::IMAGE => '画像ファイル',
        ItemType::GALLERY => 'ギャラリー',
        ItemType::VIDEOFILE => '動画ファイル',
        ItemType::PDF => 'PDFファイル',
        ItemType::THREEDIMENSION => '３Dファイル',
        ItemType::PANORAMA => '３６０度ファイル',
        ItemType::VIDEOURL => '動画URL',
    ];
}
