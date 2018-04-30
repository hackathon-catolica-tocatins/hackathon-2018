import React from 'react';
import { View, Image  , StyleSheet, Text, TouchableOpacity} from 'react-native';


const BtnMenu = (props) => {
    var {titulo, logo, descricao, press} = props;
    return (
        <TouchableOpacity onPress={()=> press()}>
            <View style={styles.vContainer}>
                <View style={styles.vIcon}>
                    <Image source={logo} style={styles.logo} resizeMode="center"/>
                </View>
                <View style={styles.vDetail}>
                    <Text style={styles.titulo}>{titulo}</Text>
                    <Text style={styles.descricao}>{descricao}</Text>

                </View>
            </View>
        </TouchableOpacity>


    )


}


const styles = StyleSheet.create({

    vContainer: {

        flexDirection: 'row',
        width: '90%',
        height: 100,
        borderColor: '#2c5871',
        borderWidth: 3,
        margin: 10,
        borderRadius: 20


    },

    vIcon: {

        flex: 1,
        paddingLeft: 15,
        paddingBottom: 10,
        paddingTop: 10,



    },

    logo: {
        flex: 1,
        height: 50,
        width: 70,


    },

    vDetail: {
        flex: 4,
        alignItems: 'center',
        justifyContent: 'center',
        padding: 10

    },



    titulo: {
        fontFamily: "browau",
        fontWeight: '500',
        fontSize: 20,

        paddingBottom: 3,
        color: '#2c5871'
    },
    descricao: {

        marginRight: 5,
        marginLeft: 5,
        textAlign: 'center',

        fontSize: 13,
        color: '#2c5871'


    },







});

export default BtnMenu;



