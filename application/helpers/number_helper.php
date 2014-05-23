<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * FusionInvoice
 * 
 * A free and open source web based invoicing system
 *
 * @package		FusionInvoice
 * @author		Jesse Terry
 * @copyright	Copyright (c) 2012 - 2013 FusionInvoice, LLC
 * @license		http://www.fusioninvoice.com/license.txt
 * @link		http://www.fusioninvoice.com
 * 
 */

function format_currency($amount)
{
    global $CI;
    $currency_symbol           = $CI->mdl_settings->setting('currency_symbol');
    $currency_symbol_placement = $CI->mdl_settings->setting('currency_symbol_placement');
    $thousands_separator       = $CI->mdl_settings->setting('thousands_separator');
    $decimal_point             = $CI->mdl_settings->setting('decimal_point');

    if ($currency_symbol_placement == 'before')
    {
        return $currency_symbol . number_format($amount, ($decimal_point) ? 2 : 0, $decimal_point, $thousands_separator);
    }
    else
    {
        return number_format($amount, ($decimal_point) ? 2 : 0, $decimal_point, $thousands_separator) . $currency_symbol;
    }
}

function format_amount($amount = NULL)
{
    if ($amount)
    {
        global $CI;
        $thousands_separator = $CI->mdl_settings->setting('thousands_separator');
        $decimal_point       = $CI->mdl_settings->setting('decimal_point');

        return number_format($amount, ($decimal_point) ? 2 : 0, $decimal_point, $thousands_separator);
    }
    return NULL;
}

function standardize_amount($amount)
{
    global $CI;
    $thousands_separator = $CI->mdl_settings->setting('thousands_separator');
    $decimal_point       = $CI->mdl_settings->setting('decimal_point');

    $amount = str_replace($thousands_separator, '', $amount);
    $amount = str_replace($decimal_point, '.', $amount);

    return $amount;
}

?>