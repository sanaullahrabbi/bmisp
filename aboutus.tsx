import React from 'react';
import { 
  Globe, 
  Phone, 
  Mail, 
  MapPin,
  Lightbulb,
  Target,
  Shield,
  Zap,
  Heart,
  Handshake,
  Award,
  Users,
  UserPlus,
  LogIn
} from 'lucide-react';

function About() {
  return (
    <div className="min-h-screen bg-white">
      {/* Header */}
      <header className="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between items-center h-16">
            <div className="flex items-center space-x-2">
              <div className="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                <Globe className="w-6 h-6 text-white" />
              </div>
              <span className="text-2xl font-bold text-gray-900">BMISP</span>
            </div>
            
            <nav className="hidden md:flex items-center space-x-8">
              <a href="#" className="text-gray-700 hover:text-red-600 font-medium transition-colors">Home</a>
              <a href="#" className="text-red-600 font-medium">About Us</a>
              <a href="#" className="text-gray-700 hover:text-red-600 font-medium transition-colors">Packages</a>
              <a href="#" className="text-gray-700 hover:text-red-600 font-medium transition-colors">FTTH</a>
              <a href="#" className="text-gray-700 hover:text-red-600 font-medium transition-colors">Coverage Area</a>
              <a href="#" className="text-gray-700 hover:text-red-600 font-medium transition-colors">Contact</a>
            </nav>

            <button className="bg-red-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-red-700 transition-all duration-300 transform hover:scale-105">
              Download App
            </button>
          </div>
        </div>
      </header>

      {/* Page Header */}
      <section className="relative bg-gradient-to-br from-gray-900 via-red-900 to-black py-20 overflow-hidden">
        <div className="absolute inset-0 bg-black/20"></div>
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
          <div className="grid lg:grid-cols-2 gap-12 items-center">
            <div className="space-y-6">
              <nav className="flex items-center space-x-2 text-sm">
                <a href="#" className="text-white/60 hover:text-white">Home</a>
                <span className="text-white/40">›</span>
                <span className="text-white">About Us</span>
              </nav>
              <h1 className="text-5xl lg:text-6xl font-bold text-white leading-tight">
                About BMISP
              </h1>
              <p className="text-xl text-white/90 leading-relaxed">
                Connecting Bangladesh with world-class fiber internet since 2021. 
                We're more than just an ISP - we're your digital transformation partner.
              </p>
            </div>
            <div className="relative">
              <img 
                src="https://images.pexels.com/photos/5077047/pexels-photo-5077047.jpeg?auto=compress&cs=tinysrgb&w=800" 
                alt="BMISP Team" 
                className="w-full h-80 object-cover rounded-2xl shadow-2xl"
              />
            </div>
          </div>
        </div>
      </section>

      {/* Our Story */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Our Story</h2>
            <p className="text-xl text-gray-600 max-w-3xl mx-auto">
              Founded with a vision to bridge the digital divide in Bangladesh
            </p>
          </div>
          
          <div className="grid md:grid-cols-2 gap-8">
            <div className="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
              <div className="w-16 h-16 bg-red-600 rounded-xl flex items-center justify-center mb-6">
                <Lightbulb className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-2xl font-bold text-gray-900 mb-4">Our Vision</h3>
              <p className="text-gray-600 leading-relaxed">
                To provide every household and business in Bangladesh with reliable, 
                high-speed fiber internet that empowers digital growth and connectivity.
              </p>
            </div>
            
            <div className="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
              <div className="w-16 h-16 bg-red-600 rounded-xl flex items-center justify-center mb-6">
                <Target className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
              <p className="text-gray-600 leading-relaxed">
                Delivering exceptional internet services through cutting-edge fiber technology, 
                outstanding customer support, and competitive pricing.
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* Company Values */}
      <section className="py-20 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Our Values</h2>
            <p className="text-xl text-gray-600">The principles that guide everything we do</p>
          </div>
          
          <div className="grid lg:grid-cols-4 md:grid-cols-2 gap-8">
            {[
              { icon: Shield, title: 'Reliability', desc: '99.9% uptime guarantee with robust infrastructure and 24/7 monitoring.' },
              { icon: Zap, title: 'Innovation', desc: 'Latest fiber technology and continuous infrastructure upgrades.' },
              { icon: Heart, title: 'Customer First', desc: 'Every decision we make prioritizes customer satisfaction and experience.' },
              { icon: Handshake, title: 'Integrity', desc: 'Transparent pricing, honest communication, and ethical business practices.' }
            ].map((value, index) => (
              <div key={index} className="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 hover:border-red-200 text-center">
                <div className="w-16 h-16 bg-red-600 rounded-xl flex items-center justify-center mx-auto mb-6 transform hover:scale-110 transition-transform duration-300">
                  <value.icon className="w-8 h-8 text-white" />
                </div>
                <h4 className="text-xl font-bold text-gray-900 mb-3">{value.title}</h4>
                <p className="text-gray-600 leading-relaxed">{value.desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Leadership Team */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Leadership Team</h2>
            <p className="text-xl text-gray-600">Meet the experts driving our mission forward</p>
          </div>
          
          <div className="grid lg:grid-cols-3 md:grid-cols-2 gap-8">
            {[
              { 
                name: 'MD Nayeemul', 
                role: 'Network Administrator', 
                image: 'https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=400',
                desc: 'Leading our network infrastructure with 8+ years of experience in telecommunications.'
              },
              { 
                name: 'Md. Saju Khan Dipu', 
                role: 'Senior Network Engineer', 
                image: 'https://images.pexels.com/photos/2182970/pexels-photo-2182970.jpeg?auto=compress&cs=tinysrgb&w=400',
                desc: 'Expert in fiber optic technology and network optimization with proven track record.'
              },
              { 
                name: 'Nayeem', 
                role: 'Customer Support Lead', 
                image: 'https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=400',
                desc: 'Ensuring exceptional customer experience with dedicated 24/7 support services.'
              }
            ].map((member, index) => (
              <div key={index} className="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 text-center group">
                <div className="relative mb-6 mx-auto w-32 h-32">
                  <img 
                    src={member.image} 
                    alt={member.name}
                    className="w-full h-full object-cover rounded-full shadow-lg group-hover:shadow-xl transition-all duration-300"
                  />
                </div>
                <h4 className="text-xl font-bold text-gray-900 mb-2">{member.name}</h4>
                <p className="text-red-600 font-semibold mb-3">{member.role}</p>
                <p className="text-gray-600 text-sm leading-relaxed">{member.desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Company Timeline */}
      <section className="py-20 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Our Journey</h2>
            <p className="text-xl text-gray-600">Key milestones in our growth story</p>
          </div>
          
          <div className="max-w-4xl mx-auto">
            <div className="relative">
              {/* Timeline Line */}
              <div className="absolute left-8 top-0 bottom-0 w-0.5 bg-red-600"></div>
              
              <div className="space-y-12">
                {[
                  { year: '2021', title: 'Company Founded', desc: 'BMISP was established with a mission to provide high-quality fiber internet services.' },
                  { year: '2022', title: 'Network Expansion', desc: 'Expanded our fiber network to cover 100+ areas across major cities.' },
                  { year: '2023', title: '400+ Customers', desc: 'Reached milestone of serving over 400 satisfied customers with 99.9% uptime.' },
                  { year: '2024', title: 'Mobile App Launch', desc: 'Launched mobile application for easy account management and customer support.' }
                ].map((milestone, index) => (
                  <div key={index} className="relative flex items-start space-x-8">
                    <div className="flex-shrink-0 w-16 h-16 bg-red-600 rounded-full flex items-center justify-center shadow-lg">
                      <span className="text-white font-bold">{milestone.year}</span>
                    </div>
                    <div className="bg-white p-6 rounded-xl shadow-lg border border-gray-100 flex-1">
                      <h4 className="text-xl font-bold text-gray-900 mb-2">{milestone.title}</h4>
                      <p className="text-gray-600 leading-relaxed">{milestone.desc}</p>
                    </div>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-gray-900 text-white py-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid md:grid-cols-4 gap-8">
            <div className="space-y-4">
              <div className="flex items-center space-x-2">
                <div className="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                  <Globe className="w-6 h-6 text-white" />
                </div>
                <span className="text-2xl font-bold">BMISP</span>
              </div>
              <p className="text-gray-400 leading-relaxed">
                Your trusted partner for high-speed fiber internet connectivity across Bangladesh.
              </p>
            </div>
            
            <div>
              <h3 className="text-lg font-semibold mb-4">Services</h3>
              <ul className="space-y-2 text-gray-400">
                <li><a href="#" className="hover:text-white transition-colors">Home Broadband</a></li>
                <li><a href="#" className="hover:text-white transition-colors">Business Internet</a></li>
                <li><a href="#" className="hover:text-white transition-colors">FTTH Solutions</a></li>
                <li><a href="#" className="hover:text-white transition-colors">Technical Support</a></li>
              </ul>
            </div>
            
            <div>
              <h3 className="text-lg font-semibold mb-4">Quick Links</h3>
              <ul className="space-y-2 text-gray-400">
                <li><a href="#" className="hover:text-white transition-colors">About Us</a></li>
                <li><a href="#" className="hover:text-white transition-colors">Coverage Area</a></li>
                <li><a href="#" className="hover:text-white transition-colors">Pricing</a></li>
                <li><a href="#" className="hover:text-white transition-colors">Contact</a></li>
              </ul>
            </div>
            
            <div>
              <h3 className="text-lg font-semibold mb-4">Contact Info</h3>
              <div className="space-y-3 text-gray-400">
                <div className="flex items-center space-x-3">
                  <Phone className="w-5 h-5 text-red-600" />
                  <span>+880 1234 567890</span>
                </div>
                <div className="flex items-center space-x-3">
                  <Mail className="w-5 h-5 text-red-600" />
                  <span>info@bmisp.net</span>
                </div>
                <div className="flex items-center space-x-3">
                  <MapPin className="w-5 h-5 text-red-600" />
                  <span>Dhaka, Bangladesh</span>
                </div>
              </div>
            </div>
          </div>
          
          <div className="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
            <p>&copy; 2024 BMISP. All rights reserved. | Designed with ❤️ for better connectivity</p>
          </div>
        </div>
      </footer>

      {/* Floating Action Buttons */}
      <div className="fixed bottom-6 right-6 z-50 flex flex-col space-y-3">
        <a 
          href="tel:+8801234567890"
          className="bg-red-600 hover:bg-red-700 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 flex items-center justify-center"
          title="Call Now"
        >
          <Phone className="w-6 h-6" />
        </a>
        
        <a 
          href="#new-connection"
          className="bg-gray-900 hover:bg-black text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 flex items-center justify-center"
          title="New Connection"
        >
          <UserPlus className="w-6 h-6" />
        </a>
        
        <a 
          href="#client-login"
          className="bg-gray-700 hover:bg-gray-800 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 flex items-center justify-center"
          title="Client Login"
        >
          <LogIn className="w-6 h-6" />
        </a>
      </div>
    </div>
  );
}

export default About;