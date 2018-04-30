import React from 'react';
import { Image  , StyleSheet} from 'react-native';

export default class BackgroundImageApp extends React.Component {

    render() {
        return (

                <Image
                    style= {styles.background}
                    source={require('../../images/background.png')}/>
         )
    }
}


const styles = StyleSheet.create({

    background:{

        backgroundColor: '#ccc',
        flex: 1,
        position: 'absolute',
        aspectRatio: 1,
        width: '100%',
        height: '100%',
        justifyContent: 'center',
    }


});
