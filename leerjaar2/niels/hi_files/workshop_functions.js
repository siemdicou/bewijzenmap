
function DownloadFile( publishFileID )
{
    $J.post( "http://steamcommunity.com/sharedfiles/downloadfile/?id=" + publishFileID )

    .done( function(response) {
        if ( response.success == 1 )
        {
            // Need to make sure the filename is set, in case there is no Content-Disposition on the result
            // So cook up an anchor, set the href and download attributes, and click it.
            // Apparently the download attribute does not work on IE. . .
            var f = $J("<a>").hide().appendTo(document.body);
            f.attr("href", response.url );
            f[0].download = response.filename;
            f[0].click();
            setTimeout( function() { f.remove() }, 0 );
        }
        else
        {
            ShowAlertDialog( 'Error', 'Unable to download file: ' + response.success );
        }
    });
}

function SharedFilesSelectApp( workshopAppURL )
{
	HideMenu( $('appselect'), $('appselect_options') );

	window.location = workshopAppURL;
}

function SharedFilesSelectTrendDayPeriod( workshopDayURL )
{
	HideMenu( $('dayselect'), $('dayselect_options') );

	window.location = workshopDayURL;
}

function DisplayErrorMessage( strMessage )
{
	$('saved_payment_info').style.display = "none";
	$('error_display').innerHTML = strMessage;
	$('error_display').style.display = 'block';
	Effect.ScrollTo( 'error_display' );

	new Effect.Highlight( 'error_display', { endcolor : '#000000', startcolor : '#ff9900' } );
}

function ValidationMarkFieldBad( elem )
{
	if ( $(elem).hasClassName( 'highlight_on_error' ) )
		new Effect.Morph( elem, {style: 'color: #FF9900', duration: 0.5 } );
	else
		new Effect.Morph( elem, {style: 'border-color: #FF9900', duration: 0.5 } )
}

function ValidationMarkFieldOk( elem )
{
	if ( $(elem).hasClassName( 'highlight_on_error' ) )
		$(elem).style.color='';
	else
		$(elem).style.borderColor = '';
}

function ReportJSError( message, e )
{
	try
	{
		if (typeof e == 'string')
    		e = new Error(e);

		DisplayErrorMessage( message + ": " + e );
	}
	catch( e )
	{
			}
}

var rgIBANCountries = {
	AD : 1,
	AT : 1,
	BE : 1,
	BA : 1,
	BG : 1,
	HR : 1,
	CY : 1,
	CZ : 1,
	DK : 1,
	EE : 1,
	FI : 1,
	FR : 1,
	DE : 1,
	GI : 1,
	GR : 1,
	HU : 1,
	IS : 1,
	IE : 1,
	IT : 1,
	LV : 1,
	LI : 1,
	LT : 1,
	LU : 1,
	MK : 1,
	MT : 1,
	MC : 1,
	ME : 1,
	NL : 1,
	NO : 1,
	PL : 1,
	PT : 1,
	RO : 1,
	SM : 1,
	RS : 1,
	SK : 1,
	SI : 1,
	ES : 1,
	SE : 1,
	CH : 1,
	TR : 1,
	GB : 1
};

function IsIBANCountry( countryCode )
{
	return rgIBANCountries[ countryCode ] != null;
}

var rgUSATaxTreaties = {
	AM :	0,
	AU :	5,
	AT :	0,
	AZ :	0,
	BD :	10,
	BB :	5,
	BY :	0,
	BE :	0,
	BG :	5,
	CA :	0,
	CN :	10,
	CY :	0,
	CZ :	0,
	DK :	0,
	EG :	15,
	EE :	10,
	FI :	0,
	FR :	0,
	DE :	0,
	GR :	0,
	HU :	0,
	IS :	0,
	IN :	15,
	ID :	10,
	IE :	0,
	IL :	10,
	IT :	0,
	JM :	10,
	JP :	0,
	KZ :	10,
	KR :	10,
	KG :	0,
	LV :	10,
	LT :	10,
	LU :	0,
	MT :	10,
	MX :	10,
	MD :	0,
	MA :	10,
	NL :	0,
	NZ :	5,
	NO :	0,
	PK :	0,
	PH :	15,
	PL :	10,
	PT :	10,
	RO :	10,
	RU :	0,
	SK :	0,
	SI :	5,
	ZA :	0,
	ES :	5,
	LK :	10,
	SE :	0,
	CH :	0,
	TJ :	0,
	TH :	5,
	TT :	0,
	TN :	15,
	TR :	10,
	TM :	0,
	UA :	10,
	GB :	0,
	US :	0,
	UZ :	0,
	VE :	10
};

function UpdateTaxRequirement()
{
	if ( $J("#tax_usa").length == 0 )
	{
		return;
	}

	try
	{
				$('tax_usa').style.display = 'none';
		$('tax_usa_treaty').style.display = 'none';
		$('tax_usa_no_treaty').style.display = 'none';

		if ( $('country').value == 'US' || $J('#uscitizen').prop('checked') )
		{
			$('tax_usa').style.display = 'block';
			return;
		}

		for ( var key in rgUSATaxTreaties )
		{
			if ( $('country').value == key )
			{
				$('tax_usa_treaty').style.display = 'block';
				return;
			}
		}

		$('tax_usa_no_treaty').style.display = 'block';
	}
	catch( e )
	{
		ReportJSError( 'Failed in UpdateTaxRequirement()', e );
	}
}

var gValidFieldAlphaNumericRegex = /^[A-Za-z0-9 &.,#'\/\-]+$/

function OnIsCompanyChange()
{
	if ( $('iscompany').checked )
	{
		$('lastnameblock').style.display = 'none';
		$J('#uscitizenblock').hide();
		$J('#uscitizen').prop( 'checked', false );
		$('firstnamelabel').innerHTML = 'Bedrijfsnaam';
	}
	else
	{
		$('lastnameblock').style.display = 'block';
		$J('uscitizenblock').show();
		$('firstnamelabel').innerHTML = 'Voornaam (zoals geschreven op bankafschriften)';
	}
}

function OnUSACitizenChange()
{
	UpdateTaxRequirement();
}

function OnLoad_UserPaymentForm()
{
	OnIsCompanyChange();
	UpdateTaxRequirement();
	UpdateBankInfo();
}

function UpdateCountrySelectState()
{
	try
	{
		if ( $('country').value == 'US' )
		{
			$('state_input').style.display = 'none';
			$('state_select').style.display = 'block';
		}
		else
		{
			$('state_input').style.display = 'block';
			$('state_input').value = '';
			$('state_select').style.display = 'none';
		}
		UpdateTaxRequirement();
	}
	catch( e )
	{
		ReportJSError( 'Failed in UpdateStateSelectState()', e );
	}
}

function UpdateBankInfo()
{
	if ( $J( "#bankaccountnumberrow").length == 0 )
	{
		return;
	}

	try
	{
				$('bankaccountnumberrow').style.display = 'block';
		$('bankroutingnumberrow').style.display = 'none';
		$('bankibanrow').style.display = 'none';
		$('bankswiftrow').style.display = 'none';

		$('bankstate_input').style.display = 'none';
		$('bankstate_select').style.display = 'none';

				if ( $('bankcountry').value == 'US' )
		{
			$('bankstate_select').style.display = 'block';
			$('bankroutingnumberrow').style.display = 'block';
			$('bankroutingnumberlabel').innerHTML = 'Bankcode';
		}
		else
		{
			$('bankstate_input').style.display = 'block';

			if ( $('bankcountry').value == 'CA' )
			{
				$('bankroutingnumberrow').style.display = 'block';
				$('bankroutingnumberlabel').innerHTML = 'Canadees transitnummer';
			}
			else if ( IsIBANCountry( $('bankcountry').value ) )
			{
				$('bankibanrow').style.display = 'block';
				$('bankswiftrow').style.display = 'block';
				$('bankaccountnumberrow').style.display = 'none';
			}
			else
			{
				$('bankswiftrow').style.display = 'block';
			}
		}
	}
	catch( e )
	{
		ReportJSError( 'Failed in UpdateBankInfo()', e );
	}
}

function IsValidRequiredField( fieldName, regex )
{
	var field = $J( fieldName );
	var value = field.val();
	value = v_trim( value );
	if ( value.length == 0 )
	{
		return false;
	}

	if ( !regex.test( value ) )
	{
		return false;
	}

	field.val( value );
	return true;
}

function ValidateUserPaymentInfo( baseURL )
{
		var errorString = '';

	bOk = true;

		try
	{
		if ( $('country').value == 'US' )
		{
			$('state').value = $('state_select').value;
		}
		else
		{
			$('state').value = $('state_input').value;
		}

				if ( $J( "#firstname").length != 0 )
		{
			if ( $( 'iscompany' ).checked )
			{
				if ( !IsValidRequiredField( "#firstname", gValidFieldAlphaNumericRegex ) )
				{
					errorString += 'Vul een bedrijfsnaam in.<br/>';
				}
				$( 'lastname' ).value = '';
			}
			else
			{
				if ( !IsValidRequiredField( "#firstname", gValidFieldAlphaNumericRegex ) )
				{
					errorString += 'Vul een geldige voornaam in.<br/>';
				}
				if ( !IsValidRequiredField( "#lastname", gValidFieldAlphaNumericRegex ) )
				{
					errorString += 'Vul een geldige achternaam in.<br/>';
				}
			}
		}

				if ( !IsValidRequiredField( "#address1", gValidFieldAlphaNumericRegex ) )
		{
			errorString += 'Vul een gedig adres in.<br/>';
		}
		if ( !IsValidRequiredField( "#city", gValidFieldAlphaNumericRegex ) )
		{
			errorString += 'Vul een geldige stad in.<br/>';
		}
		if ( $('country').value == 'US' )
		{
			if ( !IsValidRequiredField( "#zip", gValidFieldAlphaNumericRegex ) )
			{
				errorString += 'Vul een geldige postcode in.<br/>';
			}
		}
		if ( $( 'phone' ).value.length < 1 )
		{
			errorString += 'Vul je telefoonnummer, inclusief landnummer, in.<br/>';
		}
	}
	catch(e)
	{
		ReportJSError( 'Failed validating payment info form', e );
	}

	try
	{
				if ( errorString != '' )
		{
			var rgErrors = errorString.split( '<br/>' );
			DisplayErrorMessage( errorString );
		}
		else
		{
			// submit the form
			$J.ajax( {
				url: baseURL + '/ajaxsaveuserpaymentinfo/',
				method: "POST",
				data: $J( "#WorkshopPaymentInfoForm" ).serialize(),
				success : function( response ) {
					var dialog = ShowAlertDialog( 'Opgeslagen!', response.redirect_url.length != 0 ? 'Your contact and address information have been saved. Since you updated your country, you will now be redirected to an external service to update your tax information.' : 'Je contact- en adresgegevens zijn opgeslagen. Vul je bankrekening- en belastinginformatie in als je dit nog niet hebt gedaan.' );
					dialog.done( function() {
						if ( response.redirect_url.length != 0 )
						{
							top.location.assign( response.redirect_url );
						}
						else
						{
							top.location.reload();
						}
					} );
				},
				error: function( jqXHR ) {
					alert( jqXHR.responseText );
				}
			} );
		}
	}
	catch(e)
	{
		ReportJSError( 'Failed showing error or submitting payment info form', e );
	}
}

function validateFields()
{
		var errorString = '';

	bOk = true;

		try
	{
		if ( $('country').value == 'US' )
		{
			$('state').value = $('state_select').value;
		}
		else
		{
			$('state').value = $('state_input').value;
		}

		if ( $('bankcountry').value == 'US' )
		{
			$('bankstate').value = $('bankstate_select').value;
		}
		else
		{
			$('bankstate').value = $('bankstate_input').value;
		}
		
		if ( !IsIBANCountry( $('bankcountry').value ) )
		{
			$('bankiban').value = '';
		}

				if ( $( 'iscompany' ).checked )
		{
			if ( !IsValidRequiredField( "#firstname", gValidFieldAlphaNumericRegex ) )
			{
				errorString += 'Vul een bedrijfsnaam in.<br/>';
			}
		 	$( 'lastname' ).value = '';
		}
		else
		{
			if ( !IsValidRequiredField( "#firstname", gValidFieldAlphaNumericRegex ) )
			{
				errorString += 'Vul een geldige voornaam in.<br/>';
			}
			if ( !IsValidRequiredField( "#lastname", gValidFieldAlphaNumericRegex ) )
			{
				errorString += 'Vul een geldige achternaam in.<br/>';
			}
		}
		if ( !IsValidEmailAddress( $( 'email' ).value ) )
		{
			errorString += 'Vul een geldig e-mailadres in.<br/>';
		}

				if ( !IsValidRequiredField( "#address1", gValidFieldAlphaNumericRegex ) )
		{
			errorString += 'Vul een gedig adres in.<br/>';
		}
		if ( !IsValidRequiredField( "#city", gValidFieldAlphaNumericRegex ) )
		{
			errorString += 'Vul een geldige stad in.<br/>';
		}

		if ( $('country').value == 'US' )
		{
			if ( $( 'zip' ).value.length < 1 )
			{
				errorString += 'Vul een geldige postcode in.<br/>';
			}
		}

		if ( $( 'phone' ).value.length < 1 )
		{
			errorString += 'Vul je telefoonnummer, inclusief landnummer, in.<br/>';
		}

				if ( !IsValidRequiredField( "#bankname", gValidFieldAlphaNumericRegex ) )
		{
			errorString += 'Vul een geldige banknaam in.<br/>';
		}
		if ( !IsValidRequiredField( "#bankaccountholdername", gValidFieldAlphaNumericRegex ) )
		{
			errorString += 'Vul een geldige naam voor de rekeninghouder in (moet overeenkomen met bankafschriften).<br/>';
		}

				if ( !IsValidRequiredField( "#bankaddress1", gValidFieldAlphaNumericRegex ) )
		{
			errorString += 'Vul een geldig adres van je bank in.<br/>';
		}
		if ( !IsValidRequiredField( "#bankcity", gValidFieldAlphaNumericRegex ) )
		{
			errorString += 'Vul een geldige stad voor je bank in.<br/>';
		}
		if ( $('bankcountry').value == 'US' )
		{
			if ( $( 'bankzip' ).value.length < 1 )
			{
				errorString += 'Vul een geldige postcode voor je bank in.<br/>';
			}
		}

				if ( $( 'bankaccountnumber' ).value.length < 1 && !IsIBANCountry( $('bankcountry').value ) )
		{
			errorString += 'Vul je rekeningnummer in.<br/>';
		}
		if ( $( 'bankcountry' ).value == 'US' )
		{
			$('bankiban').value = '';
			$('swiftcode').value = '';
			if ( $( 'bankaccountroutingnumber' ).value.length != 9 && $( 'bankaccountroutingnumber' ).value != $( 'storedroutingnumber' ).value)
			{
				errorString += 'Vul je bankcode in. (9 cijfers)<br/>';
			}
		}
		else if ( $( 'bankcountry' ).value == 'CA' )
		{
			$('bankiban').value = '';
			$('swiftcode').value = '';
			if ( $( 'bankaccountroutingnumber' ).value.length != 9 && $( 'bankaccountroutingnumber' ).value != $( 'storedroutingnumber' ).value)
			{
				errorString += 'Vul het Canadian Transit-nummer in. (9 cijfers, begint met een 0)<br/>';
			}
		}
		else if ( IsIBANCountry( $('bankcountry').value ) )
		{
			if ( $( 'bankiban' ).value.length < 1 )
			{
				errorString += 'Vul de IBAN van je bank in.<br/>';
			}
			if ( $( 'swiftcode' ).value.length < 1 )
			{
				errorString += 'Vul de SWIFT-code van je bank in.<br/>';
			}
		}
		else
		{
			$('bankiban').value = '';
			if ( $( 'swiftcode' ).value.length < 1 )
			{
				errorString += 'Vul de SWIFT-code van je bank in.<br/>';
			}
		}
	}
	catch(e)
	{
		ReportJSError( 'Failed validating payment info form', e );
	}

	try
	{
				if ( errorString != '' )
		{
			var rgErrors = errorString.split( '<br/>' );
			DisplayErrorMessage( errorString );
		}
		else
		{
			// submit the form
			document.getElementById( 'WorkshopPaymentInfoForm' ).submit();
		}
	}
	catch(e)
	{
		ReportJSError( 'Failed showing error or submitting payment info form', e );
	}
}

function SharedFileBindMouseHover( elemId, loggedIn, itemData )
{
	var elem = $( elemId );
	Event.observe( elem, "mouseover", function() { SharedFileHover( elem, null, itemData['id'], loggedIn, itemData ); } );
	Event.observe( elem, "mouseout", function( event ) { HideWorkshopItemHover( elem, event ); } );
}

function SharedFileHover( elem, event, id, loggedIn, itemData )
{
	divHover = $('workshop_item_hover');
	if (!event) var event = window.event;
	elem = $(elem);

	var hover = $(divHover);
	if ( hover.visible() && hover.target == elem )
	{
		return;
	}
	else if ( ( !hover.visible() || hover.target != elem ) )
	{
		var description = itemData['description'] ? itemData['description'] : '';
		if ( description.length == 0 )
		{
			description = itemData['short_description'] ? itemData['short_description'] : '';
		}
		hover.down('.content').update( '<div class="hoverWorkshopItemTitle">' + itemData['title'] + '</div>' + '<div class="hoverWorkshopItemDesc">' + description + '</div>' );
		if ( itemData['user_subscribed'] )
		{
			$( 'hover_subscribed' ).show();
		}
		else
		{
			$( 'hover_subscribed' ).hide();
		}
		if ( itemData['user_favorited'] )
		{
			$( 'hover_favorited' ).show();
		}
		else
		{
			$( 'hover_favorited' ).hide();
		}
		if ( itemData['played'] )
		{
			$( 'hover_played' ).show();
		}
		else
		{
			$( 'hover_played' ).hide();
		}
		if ( itemData['user_subscribed'] || itemData['user_favorited'] || itemData['played'] )
		{
			$( 'hover_user_action_history' ).show();
		}
		else
		{
			$( 'hover_user_action_history' ).hide();
		}

		var hoverSubscriptions = $( 'hover_subscriptions' );

		// retrieve favorited by friends info
		var targetId = "favorited_by_friends_" + id;
		var elemData = $( targetId );
		ShowWorkshopItemHover( elem, divHover, loggedIn ? targetId : null );
		if ( loggedIn && !elemData && !elem.ajaxRequest )
		{
			var newDiv = new Element( 'div', { id: targetId } );
			hoverSubscriptions.down('.contentNoTopPadding').appendChild( newDiv );
			window.setTimeout( function() {
				if ( !elem.ajaxRequest ) {
					elem.ajaxRequest = new Ajax.Updater( newDiv,
								'http://steamcommunity.com/sharedfiles/friendswhofavoritedfile?id=' + id + '&appid=' + itemData['appid'],
								{ method: 'get', onComplete: function() { UpdateWorkshopItemHover( elem, divHover, targetId ); } } );
				}
			}, 0 );
		}
	}
}

function HideWorkshopItemHover( elem, event )
{
	divHover = $('workshop_item_hover');
	if (!event) var event = window.event;
	var reltarget = (event.relatedTarget) ? event.relatedTarget : event.toElement;
	if ( reltarget && $(reltarget).up( '#' + elem.identify() ) )
	{
		return;
	}
	divHover.hide();
}

function UpdateWorkshopItemHover( elem, divHover, targetContent )
{
	divHover = $('workshop_item_hover');
	if ( !divHover.visible() )
		return;
	ShowWorkshopItemHover( elem, divHover, targetContent );
}

function ShowWorkshopItemHover( elem, divHover, targetContent )
{
	var hover = $(divHover);
	hover.style.visibility = 'hidden';
	hover.show();

	if ( targetContent == null || $( targetContent ) == null )
	{
		$( 'hover_subscriptions' ).hide();
	}
	else
	{
		$( targetContent ).siblings().invoke('hide');
		$( targetContent ).show();
		if ( $( targetContent ).childElements().size() > 0 )
		{
			$( 'hover_subscriptions' ).show();
		}
		else
		{
			$( 'hover_subscriptions' ).hide();
		}
	}

	hover.clonePosition( elem, {setWidth: false, setHeight: false} );
	var hover_box = hover.down( '.hover_box' );
	var hover_arrow_left = hover.down( '.hover_arrow_left' );
	var hover_arrow_right = hover.down( '.hover_arrow_right' );

	var hover_arrow = hover_arrow_left;

	var nHoverHorizontalPadding = (hover_arrow ? -4 : 8);
	var boxRightViewport = elem.viewportOffset().left + parseInt( elem.getDimensions().width ) + hover_box.getWidth() + ( 24 - nHoverHorizontalPadding );
	var nSpaceRight = document.viewport.getWidth() - boxRightViewport;
	var nSpaceLeft = parseInt( hover.style.left ) - hover.getWidth();
	if ( boxRightViewport > document.viewport.getWidth() && nSpaceLeft > nSpaceRight)
	{
				hover.style.left = ( parseInt( hover.style.left ) - hover.getWidth() + nHoverHorizontalPadding ) + 'px';
		hover_arrow = hover_arrow_right;
	}
	else
	{
				hover.style.left = ( parseInt( hover.style.left ) + parseInt( elem.getDimensions().width ) - nHoverHorizontalPadding ) + 'px';
	}

	if ( hover_arrow )
	{
		hover_arrow_left.hide();
		hover_arrow_right.hide();
		hover_arrow.show();
	}

	var nTopAdjustment = 0;

			if ( elem.getDimensions().height < 98 )
		nTopAdjustment =  elem.getDimensions().height / 2 - 49;
	hover.style.top = ( ( parseInt( hover.style.top ) - 13 ) + nTopAdjustment ) + 'px';

	var boxTopViewport = elem.viewportOffset().top + nTopAdjustment;
	if ( boxTopViewport + hover_box.getHeight() + 8 > document.viewport.getHeight() )
	{
		var nViewportAdjustment = ( hover_box.getHeight() + 8 ) - ( document.viewport.getHeight() - boxTopViewport );
				nViewportAdjustment = Math.min( hover_box.getHeight() - 74, nViewportAdjustment );
		hover.style.top = ( parseInt( hover.style.top ) - nViewportAdjustment ) + 'px';

		if ( hover_arrow )
			hover_arrow.style.top = ( 48 + nViewportAdjustment ) + 'px';
	}
	else
	{
		if ( hover_arrow )
			hover_arrow.style.top = '';
	}

	hover.hide();
	hover.style.visibility = '';
	
	hover.show();
}

function ToggleModalMediaDetails()
{
	if ( $('ModalDetailsContainer').visible() )
	{
		$('ModalDetailsContainer').hide();
		$('ShowModalCommentsAndDetailsBtn').show();
		$('HideModalCommentsAndDetailsBtn').hide();
	}
	else
	{
		$('ModalDetailsContainer').show();
		$('ShowModalCommentsAndDetailsBtn').hide();
		$('HideModalCommentsAndDetailsBtn').show();
	}
}

function TogglePopupVisibility( popupId, buttonId )
{
	if ( $(popupId).visible() )
	{
		HideWithFade( $(popupId) );
		$(buttonId).removeClassName( 'toggled' );
	}
	else
	{
		ShowWithFade( $(popupId) );
		$(buttonId).addClassName( 'toggled' );
	}
}

function HideGreenlightCallout()
{
	$('Greenlight_Callout').hide();
	SetCookie('hideGreenlightCallout', 1, 365, '/');
}

function toggleAutoPlay()
{
	var button = $('workshop_autoplay');
	var value="false";

	if( button.hasClassName('toggled') )
	{
		value = "true";
		button.removeClassName('toggled');
	} else {
		value = "false";
		button.addClassName('toggled');
	}

	var exdate=new Date();
	exdate.setDate(exdate.getDate() + 365);
	var c_value=escape(value) + "; expires="+exdate.toUTCString();
	document.cookie="bGameHighlightAutoplayDisabled=" + c_value;
}

function ShowEnlargedImagePreview( imageURL )
{
	var enlargedImage = $( 'enlargedImage' );
	enlargedImage.src = "";
	enlargedImage.src = imageURL;
	showModal( 'previewImageEnlarged', false, true );
	Event.stop( event );
	return false;
}

var bRetrievedFriendsPicker = false;
var gFriendsPicker = null;
function ShowContributorDialog( publishedfileid )
{
	var waitDialog = ShowBlockingWaitDialog( 'Bijdragers beheren', 'Vriendenlijst wordt geladen' );

	$J.get( "http://steamcommunity.com/sharedfiles/contributorpicker/" + publishedfileid,
		{},
		function( data, textStatus, jqXHR ) {
			waitDialog.Dismiss();
			gFriendsPicker = ShowAlertDialog( 'Bijdragers beheren', '<div class="friendsPicker" id="friendsPicker">' + data + '</div>', 'Annuleren' );
		}
	);
}

function AddContributor( steamid, profileName, avatarLink )
{
	var options = {
		method: 'post',
		postBody: 'steamid=' + steamid + '&sessionid=' + g_sessionID + '&id=' + publishedfileid,
		onSuccess: (function(publishedfileid){
			return function(transport)
			{
				// Grey out modal or show spinner?
				gFriendsPicker.Dismiss();
				location.reload();
			}
		}(publishedfileid))
	};
	new Ajax.Request(
		'http://steamcommunity.com/sharedfiles/addcontributor',
		options
	);

}

function RemoveContributor( steamid, profileName, avatarLink )
{
	var options = {
		method: 'post',
		postBody: 'steamid=' + steamid + '&sessionid=' + g_sessionID + '&id=' + publishedfileid,
		onSuccess: (function(publishedfileid){
			return function(transport)
			{
				var json = transport.responseText.evalJSON();

				// Grey out modal or show spinner?
				gFriendsPicker.Dismiss();
				location.reload();
			}
		}(publishedfileid))
	};
	new Ajax.Request(
		'http://steamcommunity.com/sharedfiles/removecontributor',
		options
	);

}

function AcceptSplit( publishedfileid )
{
	var options = {
		method: 'post',
		postBody: 'id=' + publishedfileid + '&sessionid=' + g_sessionID,
		onSuccess: (function(publishedfileid){
			return function(transport)
			{
				location.reload();
			}
		}(publishedfileid))
	};
	new Ajax.Request(
		'http://steamcommunity.com/sharedfiles/acceptsplit',
		options
	);

}

function FinalizeContributors( publishedfileid )
{
	if ( confirm( 'Weet je zeker dat je de bijdragers af wilt ronden? Je kunt ze niet meer toevoegen of verwijderen na deze stap.' ) != true )
	{
		return;
	}

	var options = {
		method: 'post',
		postBody: 'id=' + publishedfileid + '&sessionid=' + g_sessionID,
		onSuccess: (function(publishedfileid){
			return function(transport)
			{
				location.reload();
			}
		}(publishedfileid))
	};
	new Ajax.Request(
		'http://steamcommunity.com/sharedfiles/finalizecontributors',
		options
	);
}

function KVPrompt( title, description, key, value )
{
	$('PromptTitle').innerHTML = title ;
	$('PromptDescription').innerHTML = description ;
	$('PromptValue').value = value;
	$('PromptValue').name = key;
	showModal('PromptModal');
}

function HighlightSearchText( text, elem )
{
	if (!(elem instanceof Node) || elem.nodeType !== Node.ELEMENT_NODE)
		return;

	var children = elem.childNodes;

	for (var i=0; children[i]; ++i)
	{
		node = children[i];

		if (node.nodeType == Node.TEXT_NODE )
		{
			var strEscaped = $J('<div>').text(node.nodeValue).html();
			strReplace = strEscaped.replace( new RegExp('(' + text.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&")  + ')', 'gi' ), '<span class="searchedForText">$1</span>');
			eleReplace = document.createElement('div');
			eleReplace.innerHTML = strReplace;

			while( eleReplace.firstChild )
				node.parentNode.insertBefore( eleReplace.firstChild, node );

			node.parentNode.removeChild( node );
		}
		else if ( node.nodeType == Node.ELEMENT_NODE )
			HighlightSearchText(text, node);
	}
}

function ShowExternalTagSelectorDialog_OnLoad()
{
	$( 'ExternalTagSelectorDialogIFrame' ).show();
}

function ShowExternalTagSelectorDialog( url, formID, submitFuncCB )
{
	$( 'ExternalTagSelectorDialogIFrame' ).hide();
	$( 'ExternalTagSelectorDialogIFrame' ).src = url;
	showModal( 'ExternalTagSelectorDialog' );

	ListenToIFrameMessage(
		function( event ) {
			var allowedHostName = 'http://' + getHostname( url );
			if ( event.origin !== allowedHostName )
				return;

			var msg = event.data.evalJSON();

			var msgType = msg['method'];

			switch( msgType )
			{
				case 'resize':
				{
					var height = msg['height'];
					var width = msg['width'];
					// show the iframe and size it
					$( 'ExternalTagSelectorDialogIFrame' ).show();
					$( 'ExternalTagSelectorDialogIFrame' ).effect = new Effect.Morph( 'ExternalTagSelectorDialogIFrame', { duration: 0.2, style: 'height: ' + height + 'px; width: ' + width + 'px' } );
					// center the dialog vertically and size it
					var flInverseZoom = 1 / (document.body.style.zoom || 1);
					var w = document.viewport.getWidth() * flInverseZoom;
					var h = document.viewport.getHeight() * flInverseZoom;
					var sl = document.viewport.getScrollOffsets().left;
					var st = document.viewport.getScrollOffsets().top;
					var cw = width;
					var ch = height;
					var newTop = (Math.floor((h / 2) - (height / 2)) + st);
					var newLeft = (Math.floor((w / 2) - (cw / 2)) + sl);
					$( 'ExternalTagSelectorDialog' ).effect = new Effect.Morph( 'ExternalTagSelectorDialog', { duration: 0.2, style: 'height: ' + height + 'px; width: ' + width + 'px; top: ' + newTop + 'px; left: ' + newLeft + 'px;' } );
				}
				break;

				case 'setfilter':
				{
					var tags = msg['tags'];

					var inputFields = $( formID ).getElementsByTagName('input');
					for ( var i = 0; i < inputFields.length; ++i )
					{
						var input = inputFields[i];
						if ( input.checked === true )
						{
							input.checked = false;
						}
					}

					for ( var i = 0; i < tags.length; ++i )
					{
						var elem = new Element( 'input', { 'name' : "requiredtags[]", 'value' : tags[i], 'checked' : 'true' } );
						$( formID ).appendChild( elem );
					}

					submitFuncCB();
				}
				break;
			} // switch
		}
	)
}

/**
 * Service Provider Revenue Sharing
 */
var gServiceProviderRevenueSliders = Array();

function PickWorkshopServiceProviders( publishedFileID, appID )
{
	// pass through current values
	var splits = Array();
	for ( var i = 0; i < gServiceProviderRevenueSliders.length; ++i )
	{
		var slider = gServiceProviderRevenueSliders[i];
		splits.push( { 'steamid' : slider.GetSteamID(), 'split' : slider.GetValue() } );
	}

	$J.post( 'http://steamcommunity.com/sharedfiles/ajaxgetserviceproviders', {
			'id' : publishedFileID,
			'appid' : appID,
			'splits' : splits,
			'sessionid' : g_sessionID
		}
	).done( function( response ) {
		var strTitle = 'Dienstverleners selecteren';
		var strSaveChanges = 'Doorgaan';
		var strDescription = response;
		var dialog = ShowConfirmDialog( strTitle, strDescription, strSaveChanges );

		dialog.SetRemoveContentOnDismissal( false );

		dialog.done( function() {
			// build list of service providers
			var service_providers = Array();
			var checkboxes = dialog.GetContent().find('input[type="checkbox"]');
			var existingValues = dialog.GetContent().find('input[type="hidden"]');
			for ( var i = 0; i < checkboxes.length; ++i )
			{
				var checkbox = checkboxes[i];
				if ( checkbox.checked )
				{
					service_providers.push( { 'steamid' : checkbox.value, 'split' : existingValues[i].value } );
				}
			}

			// get existing revenue splits, adding new and removing old
			$J.post( 'http://steamcommunity.com/sharedfiles/ajaxgetserviceprovidersplits', {
					'id' : publishedFileID,
					'sessionid' : g_sessionID,
					'service_providers' : service_providers,
					'override' : true
				}
			).done( function( response ) {
				gServiceProviderRevenueSliders = Array();
				$J('#ServiceProviders').replaceWith( response );
			});

			dialog.GetContent().remove();
		});

		dialog.fail( function() {
			dialog.GetContent().remove();
		});
	} );
}

var gNormalizingServiceProviderRevenueSliders = false;

function NormalizeServiceProviderRevenue( changingSlider )
{
	if ( gNormalizingServiceProviderRevenueSliders )
		return;

	gNormalizingServiceProviderRevenueSliders = true;
	var total = 0;
	for ( var i = 0; i < gServiceProviderRevenueSliders.length; ++i )
	{
		var slider = gServiceProviderRevenueSliders[i];
		total += slider.GetValue();
	}
	while ( total > 100 )
	{
		for ( var i = 0; i < gServiceProviderRevenueSliders.length && total > 100; ++i )
		{
			var slider = gServiceProviderRevenueSliders[i];
			if ( changingSlider != slider )
			{
				var value = slider.GetValue();
				if ( value > 0 )
				{
					slider.SetValue( value - 1 );
					total -= 1;
				}
			}
		}
	}
	gNormalizingServiceProviderRevenueSliders = false;
}

function SaveWorkshopServiceProviders( publishedFileID )
{
	var splits = Array();
	var total = 0;
	for ( var i = 0; i < gServiceProviderRevenueSliders.length; ++i )
	{
		var slider = gServiceProviderRevenueSliders[i];
		splits.push( { 'steamid' : slider.GetSteamID(), 'percentage' : slider.GetValue() } );
		total += slider.GetValue();
	}
	if ( total != 0 && total != 100 )
	{
		ShowAlertDialog( 'Fout', 'De omzetpercentages van de dienstverleners moeten in totaal 100 zijn.' );
		return;
	}

	$J( "#SavingServiceProviderRevenueShares" ).show();
	$J( "#SavedServiceProviderRevenueShares" ).hide();

	$J.post( 'http://steamcommunity.com/sharedfiles/ajaxsetserviceprovidersplits', {
			'id' : publishedFileID,
			'splits' : splits,
			'sessionid' : g_sessionID
		}
	).done( function( response ) {
		$J( "#SavingServiceProviderRevenueShares" ).hide();
		$J( "#SavedServiceProviderRevenueShares" ).show();
	} ).fail( function( jqxhr ) {
		var rgResults = jqxhr.responseText.evalJSON();
		switch ( rgResults['success'] )
		{
			case 14:
				ShowAlertDialog( 'Fout', 'Je kan geen organisatie van derden kiezen die ook een normale bijdrage heeft aan je voorwerp.' );
				break;
			default:
				ShowAlertDialog( 'Fout', 'Er is een fout opgetreden bij de verwerking van je aanvraag:' + ' ' + rgResults['success'] );
				break;
		}
		$J( "#SavingServiceProviderRevenueShares" ).hide();
	});
}

var ServiceProviderRevenueSlider = Class.create( {
	m_steamID: null,
	m_elemSlider: null,
	m_elemSliderBGFill: null,
	m_elemInput: null,
	m_elemDisplay: null,
	m_slider: null,

	initialize: function( args )
	{
		this.m_steamID = args.steamID;
		this.m_elemSlider = $( args.elemSlider );
		this.m_elemSliderBGFill = $( args.elemSliderBGFill );
		this.m_elemInput = $( args.elemInput );
		this.m_elemDisplay = $( args.elemDisplay );
		this.m_slider = new Control.Slider(
			this.m_elemSlider.down('.handle'),
			this.m_elemSlider,
			{
				range: $R( 0, 100 ),
				sliderValue: args.split,
				increment: 1,
				onSlide: this.SliderOnChange.bind( this ),
				onChange: this.SliderOnChange.bind( this )
			}
		);

		this.m_elemSliderBGFill.style.width = args.split + '%';

		gServiceProviderRevenueSliders.push( this );
	},

	SliderOnChange: function( value )
	{
		value = Math.ceil( value );
		this.m_elemInput.value = value;
		this.m_elemDisplay.innerHTML = value + '%';
		this.m_elemSliderBGFill.style.width = value + '%';
		NormalizeServiceProviderRevenue( this );
	},

	GetSteamID: function()
	{
		return this.m_steamID;
	},

	GetValue: function()
	{
		return parseInt( this.m_elemInput.value );
	},

	SetValue: function( value )
	{
		if ( value != this.GetValue() )
		{
			this.m_slider.setValue( value );
			this.m_elemInput.value = value;
			this.m_elemDisplay.innerHTML = value + '%';
			this.m_elemSliderBGFill.style.width = value + '%';
		}
	}
} );

